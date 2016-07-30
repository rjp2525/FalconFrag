<?php

namespace Falcon\Models\Shared;

use Falcon\Models\Shared\Model;

class Audit extends Model
{
    /**
     * The name of the table containing audit data
     *
     * @var string
     */
    protected $table = 'audits';

    /**
     * Fields to be formatted for output
     *
     * @var array
     */
    protected $audit_formatted_fields = array();

    /**
     * Initiate the model instance with any attributes
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
    }

    /**
     * The polymorphic relationship to get audit history for a model
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function auditable()
    {
        return $this->morphTo();
    }

    /**
     * Returns the name of the field that was updated. If the field
     * was a foreign key containing a suffix of '_id', strip it
     *
     * @return string
     */
    public function fieldName()
    {
        if ($formatted = $this->formateFieldName($this->key)) {
            return $formatted;
        } elseif (strpos($this->key, '_id')) {
            return str_replace('_id', '', $this->key);
        } else {
            return $this->key;
        }
    }

    /**
     * Formats a field name to allow overrides.
     *
     * @param  string $key
     * @return string|bool
     */
    private function formatFieldName($key)
    {
        $related_model = $this->auditable_type;
        $related_model = new $related_model;
        $audit_formatted_field_names = $related_model->getAuditFormattedFieldNames();

        if (isset($audit_formatted_field_names[$key])) {
            return $audit_formatted_field_names[$key];
        }

        return false;
    }

    /**
     * Returns the old value of a field
     *
     * @return string
     */
    public function oldValue()
    {
        return $this->getValue('old');
    }

    /**
     * Returns the new value of a field
     *
     * @return string
     */
    public function newValue()
    {
        return $this->getValue('new');
    }

    /**
     * This method does all of the grunt work for retrieving the old or new audit data
     *
     * @param  string $which
     * @return string
     */
    private function getValue($which = 'new')
    {
        $which_value = $which . '_value';

        // First get the primary model that was updated
        $main_model = $this->auditable_type;

        // Next load it with the related model
        if (class_exists($main_model)) {
            $main_model = new $main_model;

            try {
                if (strpos($this->key, 'id')) {
                    $related_model = camel_case($related_model);

                    if (!method_exists($main_model, $related_model)) {
                        throw new \Exception('Relation ' . $related_model . ' does not exist for ' . $main_model);
                    }

                    $related_class = $main_model->$related_model()->getRelated();

                    // Finally, load the model with the namespace and retrieve the data
                    $item = $related_class::find($this->$which_value);

                    if (is_null($this->$which_value) || $this->$which_value == '') {
                        $item = new $related_class;
                        return $item->getAuditNullString();
                    }

                    if (!$item) {
                        $item = new $related_class;
                        return $this->format($this->key, $item->getAuditUnknownString());
                    }

                    // Check for an available mutator
                    $mutator = 'get' . studly_case($this->key) . 'Attribute';
                    if (method_exists($item, $mutator)) {
                        return $this->format($item->$mutator($this->key), $item->identifiableName());
                    }

                    return $this->format($this->key, $item->identifiableName());
                }
            } catch (\Exception $e) {
                // This is just a fail-safe in case the data setup isn't as expected
                Log::info('Audit: ' . $e);
            }

            // If there was an issue, or if it's a normal value
            $mutator = 'get' . studly_case($this->key) . 'Attribute';
            if (method_exists($main_model, $mutator)) {
                return $this->format($this->key, $main_model->$mutator($this->$which_value));
            }
        }

        return $this->format($this->key, $this->$which_value);
    }

    /**
     * Returns the user responsible for the change
     *
     * @return mixed
     */
    public function userResponsible()
    {
        if (empty($this->user_id)) {
            return false;
        }

        return User::find($this->user_id);
    }

    /**
     * Returns the object that the current audit history is assigned to
     *
     * @return mixed
     */
    public function historyOf()
    {
        if (class_exists($class = $this->auditable_type)) {
            return $class::find($this->auditable_id);
        }

        return false;
    }

    /**
     * Format the value according to the $audit_formatted_fields array
     *
     * @param  string $key
     * @param  string $value
     * @return string
     */
    public function format($key, $value)
    {
        $related_model = $this->auditable_type;
        $related_model = new $related_model;
        $audit_formatted_fields = $related_model->getAuditFormattedFields();

        if (isset($audit_formatted_fields[$key])) {
            return $this->formatter($key, $value, $audit_formatted_fields);
        } else {
            return $value;
        }
    }

    private function formatter($key, $value, $formats)
    {
        foreach ($formats as $pkey => $format) {
            $parts = explode(':', $format);
            if (sizeof($parts) === 1) {
                continue;
            }

            if ($pkey == $key) {
                $method = array_shift($parts);

                if (method_exists(get_class(), $method)) {
                    return $this->$method($value, implode(':', $parts));
                }

                break;
            }
        }

        return $value;
    }

    /**
     * Checks if a field is empty
     *
     * @param  string $value
     * @param  array  $options
     * @return string
     */
    private function isEmpty($value, $options = array())
    {
        $value_set = isset($value) && $value != '';
        return sprintf($this->boolean($value_set, $options), $value);
    }

    /**
     * Formats a boolean field
     *
     * @param  string $value
     * @param  array  $options
     * @return string
     */
    private function boolean($value, $options = array())
    {
        if (!is_null($options)) {
            $options = explode('|', $options);
        }

        if (sizeof($options) != 2) {
            $options = ['No', 'Yes'];
        }

        return $options[!!$value];
    }

    /**
     * Formats a string response, default just returns the string
     *
     * @param  string $value
     * @param  array  $options
     * @return string
     */
    private function string($value, $options = array())
    {
        if (is_null($format)) {
            $format = '%s';
        }

        return sprintf($format, $value);
    }

    /**
     * Formats a datetime field
     *
     * @param  string $value
     * @param  array  $options
     * @return string
     */
    private function datetime($value, $options = array())
    {
        if (empty($value)) {
            return null;
        }

        $datetime = new \DateTime($value);

        return $datetime->format($format);
    }
}
