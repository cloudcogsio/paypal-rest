<?php

namespace Cloudcogs\PayPal\Support;

class Error extends JsonSerializableArrayObject
{
    use LinksHydratorTrait;

    protected const DEBUG_ID = 'debug_id';
    protected const MESSAGE = 'message';
    protected const NAME = 'name';
    protected const DETAILS = 'details';
    protected const INFORMATION_LINK = 'information_link';
    protected const LINKS = 'links';

    /**
     * @return string The PayPal internal ID. Used for correlation purposes.
     */
    public function getDebugId(): string
    {
        return $this->{self::DEBUG_ID};
    }

    /**
     * @return string The message that describes the error.
     */
    public function getMessage(): string
    {
        return $this->{self::MESSAGE};
    }

    /**
     * @return string The human-readable, unique name of the error.
     */
    public function getName(): string
    {
        return $this->{self::NAME};
    }

    /**
     * @return array|null An array of additional details about the error.
     */
    public function getDetails(): ?array
    {
        $details = $this->{self::DETAILS};
        if (is_array($details)) {
            foreach ($details as $i => $detail) {
                if (is_array($detail))
                    $details[$i] = new ErrorDetails($detail);
            }
            $this->offsetSet(self::DETAILS, $details);
        }
        return $details;
    }

    /**
     * @return string|null The information link, or URI, that shows detailed information about this error for the developer.
     */
    public function getInformationLink(): ?string
    {
        return $this->{self::INFORMATION_LINK};
    }

    /**
     * @return array|null An array of request-related HATEOAS links.
     */
    public function getLinks(): ?array
    {
        $links = $this->hydrateLinks($this->{self::LINKS});
        $this->offsetSet(self::LINKS, $links);

        return $this->{self::LINKS};
    }
}
