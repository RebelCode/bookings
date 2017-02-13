<?php

namespace RebelCode\Bookings\Test\Framework\Data;

use Xpmock\TestCase;

/**
 * Tests {@see RebelCode\Bookings\Framework\Data\MagicDataObject}.
 *
 * @since [*next-version*]
 */
class MagicDataObjectTest extends TestCase
{
    /**
     * The class name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Framework\\Data\\MagicDataObject';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return MagicDataObject
     */
    public function createInstance()
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->new();

        return $mock;
    }

    /**
     * Tests the snake case method to ensure that the case conversion works as expected.
     *
     * @since [*next-version*]
     */
    public function testSnakeCase()
    {
        $subject = $this->createInstance();

        $snakeCase = $subject->this()->_snakeCase('camelCaseName');

        $this->assertEquals('camel_case_name', $snakeCase);
    }

    /**
     * Tests the snake case cache to ensure that conversions are correctly stored in cache.
     *
     * @since [*next-version*]
     */
    public function testSnakeCaseCacheSet()
    {
        $subject = $this->createInstance();

        $snakeCase = $subject->this()->_snakeCase('camelCaseName');
        $expected  = array(
            'camelCaseName' => 'camel_case_name',
        );

        $this->assertEquals($expected, $subject->this()->_underscoreCache);
    }

    /**
     * Tests the snake case method to ensure that cached entries are correctly retrieved.
     *
     * @since [*next-version*]
     */
    public function testSnakeCaseCacheGet()
    {
        $subject = $this->createInstance();

        $subject->this()->_underscoreCache = array(
            'camelCaseName' => 'cache_test_entry',
        );

        $snakeCase = $subject->this()->_snakeCase('camelCaseName');

        $this->assertEquals('cache_test_entry', $snakeCase);
    }

    /**
     * Tests the magic get functionality to ensure that the correct data is returned.
     *
     * @since [*next-version*]
     */
    public function testMagicGet()
    {
        $subject = $this->createInstance();

        $subject->this()->data = array(
            'test_one' => 1,
            'test_two' => 2,
        );

        $this->assertEquals(1, $subject->getTestOne());
    }

    /**
     * Tests the magic get functionality with a default value given as argument. This value
     * should be ignored.
     *
     * @since [*next-version*]
     */
    public function testMagicGetWithDefault()
    {
        $subject = $this->createInstance();

        $subject->this()->data = array(
            'test_one' => 1,
            'test_two' => 2,
        );

        $this->assertEquals(2, $subject->getTestTwo('default'));
    }

    /**
     * Test the magic get functionality when no data corresponds to the called method.
     *
     * @since [*next-version*]
     */
    public function testMagicGetNoData()
    {
        $subject = $this->createInstance();

        $subject->this()->data = array(
            'test_one' => 1,
            'test_two' => 2,
        );

        $this->assertEquals(null, $subject->getTestThree());
    }

    /**
     * Tests the magic get functionality when no data corresponds to the called method and
     * a default value is given. The given default value should be returned.
     *
     * @since [*next-version*]
     */
    public function testMagicGetNoDataWithDefault()
    {
        $subject = $this->createInstance();

        $subject->this()->data = array(
            'test_one' => 1,
            'test_two' => 2,
        );

        $this->assertEquals('default', $subject->getTestThree('default'));
    }

    /**
     * Tests the magic set functionality to ensure that the correct data is internally set.
     *
     * @since [*next-version*]
     */
    public function testMagicSet()
    {
        $subject = $this->createInstance();

        $subject->setSomeData('foobar');
        $expected = array('some_data' => 'foobar');

        $this->assertEquals($expected, $subject->this()->data);
    }

    /**
     * Tests the magic set functionality when the index that corresponds to the called
     * method already exists. The data at that index should be overwritten.
     *
     * @since [*next-version*]
     */
    public function testMagicSetExistingIndex()
    {
        $subject = $this->createInstance();

        $subject->this()->data = array(
            'test_one'  => 1,
            'test_two'  => 2,
            'some_data' => 'blabla',
        );
        $expected = array(
            'test_one'  => 1,
            'test_two'  => 2,
            'some_data' => 'foobar',
        );

        $subject->setSomeData('foobar');

        $this->assertEquals($expected, $subject->this()->data);
    }

    /**
     * Tests the magic set functionality when no data is given. The index should be given
     * a value of null.
     *
     * @since [*next-version*]
     */
    public function testMagicSetNoValue()
    {
        $subject = $this->createInstance();

        $subject->setSomeData();
        $expected = array('some_data' => null);

        $this->assertEquals($expected, $subject->this()->data);
    }

    /**
     * Tests the magic has functionality with an existing index.
     *
     * @since [*next-version*]
     */
    public function testMagicHas()
    {
        $subject = $this->createInstance();

        $subject->this()->data = array(
            'test_one'  => 1,
            'test_two'  => 2,
            'some_data' => 'blabla',
        );

        $this->assertTrue($subject->hasTestTwo());
    }

    /**
     * Tests the magic has functionality with a non-existing index.
     *
     * @since [*next-version*]
     */
    public function testMagicHasNoIndex()
    {
        $subject = $this->createInstance();

        $subject->this()->data = array(
            'test_one'  => 1,
            'test_two'  => 2,
            'some_data' => 'blabla',
        );

        $this->assertFalse($subject->hasThatWhichDoesNotExist());
    }

    /**
     * Tests the magic unset functionality with an existing index.
     *
     * @since [*next-version*]
     */
    public function testMagicUns()
    {
        $subject = $this->createInstance();

        $subject->this()->data = array(
            'test_one'  => 1,
            'test_two'  => 2,
            'some_data' => 'blabla',
        );
        $expected = array(
            'test_one' => 1,
            'test_two' => 2,
        );

        $subject->unsSomeData();

        $this->assertEquals($expected, $subject->this()->data);
    }

    /**
     * Tests the magic unset functionality with a non-existing index.
     *
     * @since [*next-version*]
     */
    public function testMagicUnsNoIndex()
    {
        $subject = $this->createInstance();

        $subject->this()->data = array(
            'test_one'  => 1,
            'test_two'  => 2,
            'some_data' => 'foobar',
        );
        $expected = array(
            'test_one'  => 1,
            'test_two'  => 2,
            'some_data' => 'foobar',
        );

        $subject->unsDataThatDoesNotExist();

        $this->assertEquals($expected, $subject->this()->data);
    }
}
