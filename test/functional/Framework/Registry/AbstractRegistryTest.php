<?php

namespace RebelCode\Bookings\FuncTest\Framework\Registry;

use RebelCode\Bookings\Framework\Registry\AbstractRegistry;
use Xpmock\TestCase;

/**
 * Tests {@see RebelCode\Bookings\Framework\Registry\AbstractRegistry}.
 *
 * @since [*next-version*]
 */
class AbstractRegistryTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'RebelCode\\Bookings\\Framework\\Registry\\AbstractRegistry';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @param array          $items      The items in the registry. Default: array()
     * @param bool|\callable $validation The item validation callback or boolean. Default: true
     *
     * @return AbstractRegistry
     */
    public function createInstance(array $items = array(), $validation = true)
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->validate($validation)
            ->new();

        $mock->this()->items = $items;

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
            static::TEST_SUBJECT_CLASSNAME, $subject, 'Subject is not a valid instance.'
        );
    }

    /**
     * Tests the index existence checker method.
     *
     * @since [*next-version*]
     */
    public function testHas()
    {
        $subject = $this->createInstance(array(
            'foo',
            'bar',
        ));

        $this->assertTrue($subject->has(0));
        $this->assertTrue($subject->has(1));
        $this->assertFalse($subject->has(2));
    }

    /**
     * Tests the single entry getter method.
     *
     * @since [*next-version*]
     */
    public function testGet()
    {
        $subject = $this->createInstance(array(
            'foo',
            'bar' => 'test',
        ));

        $this->assertEquals('foo', $subject->get(0));
        $this->assertEquals('test', $subject->get('bar'));
        $this->assertNull($subject->get('random'));
    }

    /**
     * Tests the value search method.
     *
     * @since [*next-version*]
     */
    public function testIndexOf()
    {
        $subject = $this->createInstance(array(
            'foo',
            'bar',
            'test' => 'one',
        ));

        $this->assertEquals(0, $subject->indexOf('foo'));
        $this->assertEquals(1, $subject->indexOf('bar'));
        $this->assertEquals('test', $subject->indexOf('one'));
        $this->assertEquals(-1, $subject->indexOf('random'));
    }

    /**
     * Test the value existence checker method.
     *
     * @since [*next-version*]
     */
    public function testContains()
    {
        $subject = $this->createInstance(array(
            'foo',
            'bar',
        ));

        $this->assertTrue($subject->contains('foo'));
        $this->assertTrue($subject->contains('bar'));
        $this->assertFalse($subject->contains('hello'));
    }

    /**
     * Tests the item getter method.
     *
     * @since [*next-version*]
     */
    public function testGetItems()
    {
        $subject = $this->createInstance(array(
            'foo',
            'bar',
            'test' => 'one',
        ));

        $expected = array(
            'foo',
            'bar',
            'test' => 'one',
        );

        $this->assertEquals($expected, $subject->items());
    }

    /**
     * Tests the method that counts the number of entries.
     *
     * @since [*next-version*]
     */
    public function testCount()
    {
        $subject = $this->createInstance(array(
            'foo',
            'bar',
            'test' => 'one',
        ));

        $this->assertEquals(3, $subject->count());
    }

    /**
     * Tests the registration of entries.
     *
     * @since [*next-version*]
     */
    public function testRegister()
    {
        $subject = $this->createInstance(array(), function ($item) {
            return is_int($item) && ($item % 2) === 0;
        });

        $first  = $subject->register('first', 4);
        $second = $subject->register('second', 3);
        $empty  = $subject->register('', 10);

        $expected = array(
            'first' => 4,
            ''      => 10,
        );

        $this->assertEquals($expected, $subject->this()->items);
        $this->assertTrue($first);
        $this->assertFalse($second);
        $this->assertTrue($empty);
    }

    /**
     * Tests the de-registration of entries.
     *
     * @since [*next-version*]
     */
    public function testDeregister()
    {
        $subject = $this->createInstance(array(
            'first'  => 1,
            'second' => 2,
            3,
        ));

        $first     = $subject->deregister('first');
        $expected1 = array(
            'second' => 2,
            3,
        );
        $this->assertTrue($first);
        $this->assertEquals($expected1, $subject->this()->items);

        $second    = $subject->deregister('second');
        $expected2 = array(
            3,
        );
        $this->assertTrue($second);
        $this->assertEquals($expected2, $subject->this()->items);
    }

    /**
     * Tests the de-registration when an entry does not have a string key. The integer index
     * should be used for de-registration in such cases.
     *
     * @since [*next-version*]
     */
    public function testDeregisterNoKey()
    {
        $subject = $this->createInstance(array(
            'first' => 'one',
            'two',
        ));

        $empty     = $subject->deregister('');
        $expected1 = array(
            'first' => 'one',
            'two',
        );
        $this->assertFalse($empty);
        $this->assertEquals($expected1, $subject->this()->items);

        $intIndex  = $subject->deregister(0);
        $expected2 = array(
            'first' => 'one',
        );
        $this->assertTrue($intIndex);
        $this->assertEquals($expected2, $subject->this()->items);
    }
}
