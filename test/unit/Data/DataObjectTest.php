<?php

namespace RebelCode\Bookings\Test\Data;

use RebelCode\Bookings\Data\DataObject;
use Xpmock\TestCase;

/**
 * Tests {@see RebelCode\Bookings\Data\DataObject}.
 *
 * @since [*next-version*]
 */
class DataObjectTest extends TestCase
{
    /**
     * Creates the test subject instance.
     *
     * @since [*next-version*]
     *
     * @return DataObject
     */
    public function createInstance()
    {
        return new DataObject();
    }

    /**
     * Tests the constructor's initialization.
     *
     * @since [*next-version*]
     */
    public function testConstructor()
    {
        $subject = $this->createInstance();

        $data = $this->reflect($subject)->data;

        $this->assertTrue(is_array($data));
        $this->assertEquals(0, count($data));
    }

    /**
     * Tests the data getter method with no arguments.
     *
     * @since [*next-version*]
     */
    public function testGetDataNoArgs()
    {
        $subject = $this->createInstance();

        $this->reflect($subject)->data = $expected = array(
            'sample'  => 'data',
            'testing' => true,
        );

        $this->assertEquals($expected, $subject->getData());
    }

    /**
     * Tests the data getter method with an existing key.
     *
     * @since [*next-version*]
     */
    public function testGetDataWithValidKey()
    {
        $subject = $this->createInstance();

        $this->reflect($subject)->data = $expected = array(
            'sample'  => 'data',
            'testing' => true,
        );

        $this->assertEquals('data', $subject->getData('sample'));
    }

    /**
     * Tests the data getter method with a non-existing key.
     *
     * @since [*next-version*]
     */
    public function testGetDataWithInvalidKeyNoDefault()
    {
        $subject = $this->createInstance();

        $this->reflect($subject)->data = $expected = array(
            'sample'  => 'data',
            'testing' => true,
        );

        $this->assertEquals(null, $subject->getData('invalid'));
    }

    /**
     * Tests the data getter method with a non-existing key and a default value.
     *
     * @since [*next-version*]
     */
    public function testGetDataWithInvalidKeyWithDefault()
    {
        $subject = $this->createInstance();

        $this->reflect($subject)->data = $expected = array(
            'sample'  => 'data',
            'testing' => true,
        );

        $this->assertEquals('default', $subject->getData('invalid', 'default'));
    }

    /**
     * Tests the data existence check method with an existing key.
     *
     * @since [*next-version*]
     */
    public function testHasDataWithValidKey()
    {
        $subject = $this->createInstance();

        $this->reflect($subject)->data = $expected = array(
            'sample'  => 'data',
            'testing' => true,
        );

        $this->assertTrue($subject->hasData('testing'));
    }

    /**
     * Tests the data existence check method with a non-existing key.
     *
     * @since [*next-version*]
     */
    public function testHasDataWithInvalidKey()
    {
        $subject = $this->createInstance();

        $this->reflect($subject)->data = $expected = array(
            'sample'  => 'data',
            'testing' => true,
        );

        $this->assertFalse($subject->hasData('wrong'));
    }

    /**
     * Tests the data setter method with an array argument.
     *
     * @since [*next-version*]
     */
    public function testSetDataWithArray()
    {
        $subject = $this->createInstance();

        $expected = array(
            'sample'  => 'data',
            'testing' => true,
        );
        $subject->setData($expected);

        $this->assertEquals($expected, $this->reflect($subject)->data);
    }

    /**
     * Tests the data setter method with both key and value arguments.
     *
     * @since [*next-version*]
     */
    public function testSetDataWithKeyValue()
    {
        $subject = $this->createInstance();

        $subject->setData('test_key', 15.80);

        $this->assertEquals(15.80, $this->reflect($subject)->data['test_key']);
    }

    /**
     * Tests the data unset method without arguments.
     *
     * @since [*next-version*]
     */
    public function testUnsDataWithNoArgs()
    {
        $subject = $this->createInstance();

        $this->reflect($subject)->data = array(
            'sample'  => 'data',
            'testing' => true,
        );

        $subject->unsData();

        $this->assertEquals(0, count($this->reflect($subject)->data));
    }

    /**
     * Tests the data unset method without arguments.
     *
     * @since [*next-version*]
     */
    public function testUnsDataWithKey()
    {
        $subject = $this->createInstance();

        $this->reflect($subject)->data = array(
            'sample'  => 'data',
            'testing' => true,
        );

        $subject->unsData('sample');

        $this->assertEquals(array('testing' => true), $this->reflect($subject)->data);
    }
}
