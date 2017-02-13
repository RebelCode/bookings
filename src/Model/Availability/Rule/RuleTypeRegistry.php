<?php

namespace RebelCode\Bookings\Model\Availability\Rule;

use \RebelCode\Bookings\Framework\Model\GenericModel;
use \RebelCode\Bookings\Framework\Storage\ResourceModelInterface;
use \Traversable;

/**
 * Basic implementation of a rule type registry model.
 *
 * @since [*next-version*]
 */
class RuleTypeRegistry extends GenericModel implements RuleTypeRegistryInterface
{
    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function __construct($data = array(), ResourceModelInterface $resourceModel = null)
    {
        parent::__construct(array(), $resourceModel);

        $this->registerMany($data);
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getRuleType($id)
    {
        return $this->getData($id, null);
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getRuleTypes()
    {
        return $this->getData();
    }

    /**
     * Registers a rule type to this registry.
     *
     * @since [*next-version*]
     *
     * @param RuleTypeInterface $ruleType The rule type instance.
     *
     * @return $this This instance.
     */
    public function register(RuleTypeInterface $ruleType)
    {
        $this->setData($ruleType->getId(), $ruleType);

        return $this;
    }

    /**
     * Registers a set of rule types to this registry.
     *
     * @since [*next-version*]
     *
     * @param array|Traversable $ruleTypes The rule types array or traversable object.
     *
     * @return $this This instance.
     */
    public function registerMany($ruleTypes)
    {
        foreach ($ruleTypes as $_ruleType) {
            $this->register($_ruleType);
        }

        return $this;
    }

    /**
     * Removes a rule type from the registry.
     *
     * @since [*next-version*]
     *
     * @param RuleTypeInterface|string $ruleType The rule type instance or ID.
     *
     * @return $this This instance.
     */
    public function unregister($ruleType)
    {
        $id = ($ruleType instanceof RuleTypeInterface)
            ? $ruleType->getId()
            : $ruleType;

        $this->unsData($id);

        return $this;
    }
}
