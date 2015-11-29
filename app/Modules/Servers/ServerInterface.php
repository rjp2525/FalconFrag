<?php

namespace Falcon\Modules\Servers;

interface ServerInterface
{
    /**
     * Create a new service
     *
     * @return mixed
     */
    public function create($params);

    /**
     * Update the service information
     *
     * @param string $id
     * @return mixed
     */
    public function update($id);

    /**
     * Suspend a service with the specified ID
     *
     * @param  string $id
     * @return bool
     */
    public function suspend($id);

    /**
     * Unsuspend a service with the specified ID
     *
     * @param  string $id
     * @return bool
     */
    public function unsuspend($id);

    /**
     * Terminate a service with the specified ID
     *
     * @param  string $id
     * @return bool
     */
    public function terminate($id);

    /**
     * Renew the service with the specified ID and add the
     * specified length of time (in seconds) to renewal date
     *
     * @param  string $id
     * @param  int    $time
     * @return bool
     */
    public function renew($id, $time);
}
