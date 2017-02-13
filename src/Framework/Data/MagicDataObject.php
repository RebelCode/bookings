<?php

namespace RebelCode\Bookings\Framework\Data;

/**
 * A DataObject that allows retrieving and setting data via magic-calling virtual methods.
 *
 * @since [*next-version*]
 */
class MagicDataObject extends DataObject
{
    /**
     * Cache for the `_underscore()` method.
     *
     * @since [*next-version*]
     * @see _underscore()
     *
     * @var array
     */
    protected $_underscoreCache = array();

    /**
     * Allows virtual methods to get/set/unset/check data.
     *
     * @since [*next-version*]
     *
     * @param string $method The name of the method called.
     * @param array  $args   An array of arguments passed to the called method.
     *
     * @return mixed The result.
     */
    public function __call($method, $args)
    {
        $prefix = substr($method, 0, 3);
        $suffix = substr($method, 3);
        $key    = $this->_snakecase($suffix);
        $arg    = isset($args[0])
            ? $args[0]
            : null;

        switch ($prefix) {
            case 'get' :
                $data = $this->getData($key, $arg);

                return $data;

            case 'set' :
                $result = $this->setData($key, $arg);

                return $result;

            case 'uns' :
                $result = $this->unsData($key);

                return $result;

            case 'has' :
                return $this->hasData($key);
        }

        throw new \Exception(
            sprintf('Invalid method %1$s::%2$s(%3$s)', get_class($this), $method, print_r($args, 1))
        );
    }

    /**
     * Converts a given camel case field name to snake case.
     *
     * Uses cache to eliminate unnecessary `preg_replace()` calls.
     *
     * @since [*next-version*]
     *
     * @param string $camelName The camel case name.
     *
     * @return string The snake cased name.
     */
    protected function _snakecase($camelName)
    {
        if (isset($this->_underscoreCache[$camelName])) {
            return $this->_underscoreCache[$camelName];
        }

        $result = strtolower(preg_replace('/(.)([A-Z])/', '$1_$2', $camelName));

        $this->_underscoreCache[$camelName] = $result;

        return $result;
    }
}
