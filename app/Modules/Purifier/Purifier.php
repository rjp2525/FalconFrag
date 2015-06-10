<?php

namespace Falcon\Modules\Purifier;

use Exception;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Config\Repository;
use Illuminate\Filesystem\Filesystem;

class Purifier
{

    /**
     * @var Filesystem
     */
    protected $files;

    /**
     * @var Repository
     */
    protected $config;

    /**
     * @var HTMLPurifier
     */
    protected $purifier;

    /**
     * Constructor
     *
     * @param Filesystem $files
     * @param Repository $config
     * @throws Exception
     */
    public function __construct(Filesystem $files, Repository $config)
    {
        $this->files = $files;
        $this->config = $config;

        $this->setUp();
    }

    /**
     * Setup
     *
     * @throws Exception
     */
    private function setUp()
    {
        if (!$this->config->has('purifier')) {
            if (!$this->config->has('mews.purifier')) {
                throw new Exception('Configuration parameters not loaded!');
            }
            $this->config->set('purifier', $this->config->get('mews.purifier'));
        }

        $this->checkCacheDirectory();

        // Create a new configuration object
        $config = HTMLPurifier_Config::createDefault();
        // Allow configuration to be modified
        if (!$this->config->get('purifier.finalize')) {
            $config->autoFinalize = false;
        }

        // Use the same character set as Laravel
        $config->set('Core.Encoding', $this->config->get('purifier.encoding'));

        $config->set('Cache.SerializerPath', $this->config->get('purifier.cachePath'));

        $config->loadArray($this->getConfig());

        // Create HTMLPurifier object
        $this->purifier = new HTMLPurifier($this->configure($config));
    }

    /**
     * Check/Create cache directory
     */
    private function checkCacheDirectory()
    {
        $cachePath = $this->config->get('purifier.cachePath');

        if (!$this->files->isDirectory($cachePath)) {
            $this->files->makeDirectory($cachePath);
        }
    }

    /**
     * @param HTMLPurifier_Config $config
     * @return HTMLPurifier_Config
     */
    protected function configure(HTMLPurifier_Config $config)
    {
        return HTMLPurifier_Config::inherit($config);
    }

    /**
     * @param null $config
     * @return mixed|null
     */
    protected function getConfig($config = null)
    {
        if (!$config) {
            if (!$this->config->get('purifier.settings.default')) {
            }
            $chosen = 'purifier.settings.default.definitions';
            $config = $this->config->get('purifier.settings.default');
        } elseif (is_string($config)) {
            $chosen = 'purifier.settings.' . $config . '.definitions';
            $config = $this->config->get('purifier.settings.' . $config);
        }

        if (isset($chosen)) {
            unset($config['definitions']);

            if ($this->config->has($chosen) && is_object($this->purifier)) {
                $c = HTMLPurifier_Config::createDefault();
                $c->loadArray($config);

                $c->set('HTML.DefinitionID', $this->config->get($chosen . '.def.id'));
                $c->set('HTML.DefinitionRev', $this->config->get($chosen . '.def.rev'));

                if ($def = $c->maybeGetRawHTMLDefinition()) {
                    foreach ($this->config->get($chosen . '.elements') as $element) {
                        if (isset($element[4])) {
                            $def->addElement($element[0], $element[1], $element[2], $element[3], $element[4]);
                        } else {
                            $def->addElement($element[0], $element[1], $element[2], $element[3]);
                        }
                    }

                    foreach ($this->config->get($chosen . '.attributes') as $element) {
                        $def->addAttribute($element[0], $element[1], $element[2]);
                    }
                }

                $config = $c;
            }
        }

        return $config;
    }

    /**
     * @param $dirty
     * @param null $config
     * @return mixed
     */
    public function clean($dirty, $config = null)
    {
        if (is_array($dirty)) {
            return array_map(function ($item) use ($config) {
                return $this->clean($item, $config);
            }, $dirty);
        } else {
            return $this->purifier->purify($dirty, $this->getConfig($config));
        }
    }

}
