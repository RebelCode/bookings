<?php

namespace RebelCode\Bookings\Test\Model;

use RebelCode\Bookings\Model\AbstractModel;
use Xpmock\TestCase;

/**
 * Description of AbstractModelTest.
 *
 * @since [*next-version*]
 */
class AbstractModelTest extends TestCase
{
    /**
     * Creates the test subject instance.
     *
     * @since [*next-version*]
     *
     * @return AbstractModel
     */
    public function createInstance()
    {
        $mock = $this->mock('RebelCode\\Bookings\\Model\\AbstractModel')
            ->new();

        return $mock;
    }

    /**
     * Tests the ID field name getter with the field name left as default.
     *
     * @since [*next-version*]
     */
    public function testGetFieldNameDefault()
    {
        $subject = $this->createInstance();

        $this->assertEquals(AbstractModel::DEFAULT_ID_FIELD_NAME, $subject->getIdFieldName());
    }

    /**
     * Tests the ID field name getter with a preset value.
     *
     * @since [*next-version*]
     */
    public function testGetFieldNamePresetValue()
    {
        $subject = $this->createInstance();

        $this->reflect($subject)->idFieldName = 'test';

        $this->assertEquals('test', $subject->getIdFieldName());
    }

    /**
     * Tests the ID getter method with the field name left as default.
     *
     * @since [*next-version*]
     */
    public function testGetIdDefaultFieldName()
    {
        $subject = $this->createInstance();

        $this->reflect($subject)->data = array(
            'id' => 'test123',
        );

        $this->assertEquals('test123', $subject->getId());
    }

    /**
     * Tests the ID getter method with a pre-set field name.
     *
     * @since [*next-version*]
     */
    public function testGetIdPresetFieldName()
    {
        $subject = $this->createInstance();

        $reflection              = $this->reflect($subject);
        $reflection->idFieldName = 'some_key';
        $reflection->data        = array(
            'some_key' => 'test123',
            'id'       => 54321,
        );

        $this->assertEquals('test123', $subject->getId());
    }

    /**
     * Tests the ID setter method with the field name left as default.
     *
     * @since [*next-version*]
     */
    public function testSetIdDefaultFieldName()
    {
        $subject = $this->createInstance();

        $reflection = $this->reflect($subject);
        $reflection->_setId(234);

        $this->assertArraySubset(array('id' => 234), $reflection->data);
    }

    /**
     * Tests the ID setter method with a pre-set field name.
     *
     * @since [*next-version*]
     */
    public function testSetIdPresetFieldName()
    {
        $subject = $this->createInstance();

        $reflection              = $this->reflect($subject);
        $reflection->idFieldName = 'some_key';

        $reflection->_setId(234);

        $this->assertArraySubset(array('some_key' => 234), $reflection->data);
    }

    /**
     * Tests the resource model getter method when no resource model has been set.
     *
     * @since [*next-version*]
     */
    public function testGetResourceModelNull()
    {
        $subject = $this->createInstance();

        $this->assertEquals(null, $subject->getResourceModel());
    }

    /**
     * Tests the resource model getter method with a preset instance.
     *
     * @since [*next-version*]
     */
    public function testGetResourceModelPresetInstance()
    {
        $subject = $this->createInstance();

        $rm                                     = $this->getMockForAbstractClass('RebelCode\\Bookings\\Storage\\ResourceModelInterface');
        $this->reflect($subject)->resourceModel = $rm;

        $this->assertEquals($rm, $subject->getResourceModel());
    }

    /**
     * Tests the resource model setter method.
     *
     * @since [*next-version*]
     */
    public function testSetResourceModel()
    {
        $subject = $this->createInstance();

        $rm = $this->getMockForAbstractClass('RebelCode\\Bookings\\Storage\\ResourceModelInterface');
        $this->reflect($subject)->_setResourceModel($rm);

        $this->assertEquals($rm, $this->reflect($subject)->resourceModel);
    }
}
