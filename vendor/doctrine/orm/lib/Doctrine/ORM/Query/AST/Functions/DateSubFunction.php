<?php

/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license. For more information, see
 * <http://www.doctrine-project.org>.
 */

namespace Doctrine\ORM\Query\AST\Functions;

use Doctrine\ORM\Query\QueryException;
use Doctrine\ORM\Query\SqlWalker;

use function strtolower;

/**
 * "DATE_ADD(date1, interval, unit)"
 *
 * @link    www.doctrine-project.org
 */
class DateSubFunction extends DateAddFunction
{
    /**
     * @override
     * @inheritdoc
     */
    public function getSql(SqlWalker $sqlSqlWalker)
    {
        switch (strtolower($this->unit->value)) {
            case 'second':
                return $sqlSqlWalker->getConnection()->getDatabasePlatform()->getDateSubSecondsExpression(
                    $this->firstDateExpression->dispatch($sqlSqlWalker),
                    $this->intervalExpression->dispatch($sqlSqlWalker)
                );

            case 'minute':
                return $sqlSqlWalker->getConnection()->getDatabasePlatform()->getDateSubMinutesExpression(
                    $this->firstDateExpression->dispatch($sqlSqlWalker),
                    $this->intervalExpression->dispatch($sqlSqlWalker)
                );

            case 'hour':
                return $sqlSqlWalker->getConnection()->getDatabasePlatform()->getDateSubHourExpression(
                    $this->firstDateExpression->dispatch($sqlSqlWalker),
                    $this->intervalExpression->dispatch($sqlSqlWalker)
                );

            case 'day':
                return $sqlSqlWalker->getConnection()->getDatabasePlatform()->getDateSubDaysExpression(
                    $this->firstDateExpression->dispatch($sqlSqlWalker),
                    $this->intervalExpression->dispatch($sqlSqlWalker)
                );

            case 'week':
                return $sqlSqlWalker->getConnection()->getDatabasePlatform()->getDateSubWeeksExpression(
                    $this->firstDateExpression->dispatch($sqlSqlWalker),
                    $this->intervalExpression->dispatch($sqlSqlWalker)
                );

            case 'month':
                return $sqlSqlWalker->getConnection()->getDatabasePlatform()->getDateSubMonthExpression(
                    $this->firstDateExpression->dispatch($sqlSqlWalker),
                    $this->intervalExpression->dispatch($sqlSqlWalker)
                );

            case 'year':
                return $sqlSqlWalker->getConnection()->getDatabasePlatform()->getDateSubYearsExpression(
                    $this->firstDateExpression->dispatch($sqlSqlWalker),
                    $this->intervalExpression->dispatch($sqlSqlWalker)
                );

            default:
                throw QueryException::semanticalError(
                    'DATE_SUB() only supports units of type second, minute, hour, day, week, month and year.'
                );
        }
    }
}
