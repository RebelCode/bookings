<?php

namespace RebelCode\Bookings\Model\Availability;

use \Dhii\Espresso\AbstractGenericLogicalExpression;
use \Dhii\Espresso\Expression\AndExpression;
use \Dhii\Espresso\Expression\OrExpression;
use \Dhii\Expression\ExpressionInterface;
use \RebelCode\Bookings\Model\Availability\Rule\RuleInterface;

/**
 * A rule availability implementation that works in the same way that EDD Bookings
 * availability builder traditionally did.
 *
 * The evaluation happens
 *
 * @since [*next-version*]
 */
class TraditionalRuleAvailability extends AbstractRuleAvailability
{
    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getExpression()
    {
        $expression  = new OrExpression();

        foreach ($this->getRules() as $_rule) {
            $expression = ($_rule->isNegated())
                ? $this->_addNegatedRule($expression, $_rule)
                : $this->_addRule($expression, $_rule);
        }

        return $expression;
    }

    /**
     * Adds an available rule to an expression.
     *
     * if the given expression is an OR expression, the rule will simply be added as a term
     * to that expression.
     *
     * If the given expression is an AND expression, an OR expression will be returned with
     * its terms set as follows:
     *
     * 1. The AND expression given as 1st argument.
     *
     * 2. The rule given as 2nd argument.
     *
     * @param ExpressionInterface $expression The expression instance.
     * @param RuleInterface $rule The rule instance.
     *
     * @return OrExpression The result.
     */
    protected function _addRule(AbstractGenericLogicalExpression $expression, RuleInterface $rule)
    {
        if (!$expression instanceof OrExpression) {
            $newExpr = new OrExpression();
            $newExpr->addTerm($expression);
            $expression = $newExpr;
        }

        $expression->addTerm($rule);

        return $expression;
    }

    /**
     * Adds an unavailable rule to an expression.
     *
     * If the given expression is an AND expression, the rule will simply be added as a term
     * of that expression.
     *
     * If the given expression is an OR expression, and AND expression will be returned with
     * its terms set as follows:
     *
     * 1. The OR expression given as 1st argument.
     *
     * 2. The rule given as 2nd argument.
     *
     * @param ExpressionInterface $expression The expression instance.
     * @param RuleInterface $rule The rule instance.
     *
     * @return AndExpression The result.
     */
    protected function _addNegatedRule(AbstractGenericLogicalExpression $expression, RuleInterface $rule)
    {
        if (!$expression instanceof AndExpression) {
            $newExpr = new AndExpression();
            $newExpr->addTerm($expression);
            $expression = $newExpr;
        }

        $expression->addTerm($rule);

        return $expression;
    }
}
