<?php

namespace RebelCode\Bookings\Framework\Data;

/**
 * A data object: an object with an internal data set and data management methods.
 *
 * @since [*next-version*]
 */
class DataObject implements DataObjectInterface
{
    /**
     * The internal data set.
     *
     * @since [*next-version*]
     *
     * @var array
     */
    protected $data;

    /**
     * Constructor.
     *
     * @since [*next-version*]
     *
     * @param array $data [optional] An associative array. Default: array()
     */
    public function __construct(array $data = array())
    {
        $this->unsData()
            ->setData($data);
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getData($key = null, $default = null)
    {
        if (is_null($key)) {
            return $this->data;
        }

        $sKey = (string) $key;

        return isset($this->data[$sKey])
            ? $this->data[$sKey]
            : $default;
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function hasData($key = null)
    {
        $sKey = (string) $key;

        return isset($this->data[$sKey]);
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     *
     * @return $this This instance.
     */
    public function setData($key, $value = null)
    {
        if (is_array($key)) {
            $this->data = $key;

            return $this;
        }

        $sKey = (string) $key;

        $this->data[$sKey] = $value;
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     *
     * @return $this This instance.
     */
    public function unsData($key = null)
    {
        if (is_null($key)) {
            $this->data = array();

            return $this;
        }

        $sKey = (string) $key;
        unset($this->data[$sKey]);

        return $this;
    }
}
