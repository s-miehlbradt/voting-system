<?php

namespace Michaelc\Voting\STV;

class Ballot
{
    /**
     * Ranking of candidates ids
     *
     * @var integer[]
     */
    protected $ranking;

    /**
     * The current weighting or value of this person's vote
     *
     * @var float
     */
    protected $weight;

    /**
     * The current preference in use from this ballot
     *
     * @var integer
     */
    protected $levelUsed;

    /**
     * Constructor
     *
     * @param integer[] $ranking The ranking of candidates Key being ranking,
     *                       value being a candidate id
     */
    public function __construct(array $ranking)
    {
        $this->weight = 1.0;
        $this->ranking = $ranking;
        $this->levelUsed = -1;
    }

    /**
     * Gets the Ranking of candidates ids.
     *
     * @return array
     */
    public function getRanking(): array
    {
        return $this->ranking;
    }

    /**
     * Sets the Ranking of candidates ids.
     *
     * @param array $ranking the ranking
     *
     * @return self
     */
    public function setRanking(array $ranking)
    {
        $this->ranking = $ranking;

        return $this;
    }

    /**
     * Gets the The current weighting or value of this person's vote.
     *
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * Sets the The current weighting or value of this person's vote.
     *
     * @param float $weight the weight
     *
     * @return self
     */
    public function setWeight(float $weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Gets the the current preference in use from this ballot.
     *
     * @return integer
     */
    public function getLevelUsed(): int
    {
        return $this->levelUsed;
    }

    /**
     * Sets the the current preference in use from this ballot.
     *
     * @param integer $levelUsed
     *
     * @return self
     */
    public function setLevelUsed(int $levelUsed)
    {
        $this->levelUsed = $levelUsed;

        return $this;
    }

    public function getLastChoice()
    {
        $level = $levelUsed;

        if (empty($this->ranking[$level]))
        {
            return null;
        }

        return $this->ranking[$level];
    }

    public function getNextChoice()
    {
        $level = $levelUsed + 1;

        if (empty($this->ranking[$level]))
        {
            return null;
        }

        return $this->ranking[$level];
    }

    public function getNextChoiceWorth(): float
    {
        return 0.0;
    }
}
