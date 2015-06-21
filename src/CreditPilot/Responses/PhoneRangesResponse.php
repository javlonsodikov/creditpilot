<?php

namespace CreditPilot\Responses;

class PhoneRangesResponse extends AbstractResponse
{

	public function resultCode()
	{
		return current($this->parsed()->result->attributes()->resultCode);
	}

	public function resultDescription()
	{
		return current($this->parsed()->result->attributes()->resultDescription);
	}

	/**
	 * Provider name
	 *
	 * @return string
	 */
	public function providerName()
	{
		if (!$this->nodeExists()) {
			return null;
		}

		return current($this->parsed()->phoneRange->attributes()->providerName);
	}

	public function defCode()
	{
		if (!$this->nodeExists()) {
			return null;
		}

		return current($this->parsed()->phoneRange->attributes()->defCode);
	}

	public function locationName()
	{
		if (!$this->nodeExists()) {
			return null;
		}

		return current($this->parsed()->phoneRange->attributes()->locationName);
	}

	/**
	 * Array of provider ids that can be used
	 *
	 * @return array
	 */
	public function providerIds()
	{
		if (!$this->nodeExists()) {
			return null;
		}

		return explode(',', current($this->parsed()->phoneRange->attributes()->providerIds));
	}

	private function nodeExists()
	{
		return isset($this->parsed()->phoneRange);
	}

}
