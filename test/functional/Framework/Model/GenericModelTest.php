<?php

namespace RebelCode\Bookings\FuncTest\Framework\Model;

use \RebelCode\Bookings\Framework\Model\GenericModel;
use \Xpmock\TestCase;

/**
 * Tests {@see RebelCode\Bookings\Framework\Model\GenericModel}.
 *
 * @since [*next-version*]
 */
class GenericModelTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Framework\\Model\\GenericModel';

    /**
     * The class name of the abstract resource model interface.
     *
     * @since [*next-version*]
     */
    const RESOURCE_MODEL_CLASSNAME = 'RebelCode\\Bookings\\Framework\\Storage\\ResourceModelInterface';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return GenericModel
     */
    public function createInstance()
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->new();

        return $mock;
    }

    /**
     * Tests whether a valid instance of the test subject can be created.
     *
     * @since [*next-version*]
     */
    public function testCanBeCreated()
    {
        $subject = $this->createInstance();

        $this->assertInstanceOf(
            static::TEST_SUBJECT_CLASSNAME, $subject,
            'Subject is not a valid instance.'
        );

        $this->assertInstanceOf(
            'RebelCode\\Bookings\\Framework\\Model\\AbstractModel', $subject,
            'Subject is not a valid AbstractModel instance.'
        );
    }

    /**
     * Tests the ID field name getter with the field name left as default.
     *
     * @since [*next-version*]
     */
    public function testGetFieldNameDefault()
    {
        $subject = $this->createInstance();

        $idFieldName = $subject->getIdFieldName();

        $this->assertEquals(GenericModel::DEFAULT_ID_FIELD_NAME, $idFieldName);
    }

    /**
     * Tests the ID field name getter with a preset value.
     *
     * @since [*next-version*]
     */
    public function testGetFieldNamePresetValue()
    {
        $subject = $this->createInstance();

        $subject->this()->idFieldName = 'test';

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

        $subject->this()->data = array(
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

        $subject->this()->idFieldName = 'some_key';
        $subject->this()->data = array(
            'id'       => 54321,
            'some_key' => 'test123'
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

        $subject->setId(234);

        $this->assertArraySubset(array('id' => 234), $subject->this()->data);
    }

    /**
     * Tests the ID setter method with a pre-set field name.
     *
     * @since [*next-version*]
     */
    public function testSetIdPresetFieldName()
    {
        $subject = $this->createInstance();

        $subject->this()->idFieldName = 'some_key';
        $subject->setId(234);

        $this->assertArraySubset(array('some_key' => 234), $subject->this()->data);
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

        $rm = $this->getMockForAbstractClass(static::RESOURCE_MODEL_CLASSNAME);
        $subject->this()->resourceModel = $rm;

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

        $rm = $this->getMockForAbstractClass(static::RESOURCE_MODEL_CLASSNAME);
        $subject->setResourceModel($rm);

        $this->assertEquals($rm, $subject->this()->resourceModel);
    }
}
