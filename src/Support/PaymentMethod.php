<?php

namespace Cloudcogs\PayPal\Support;

use Cloudcogs\PayPal\Exception\ValueOutOfBoundsException;

/**
 * @see https://developer.paypal.com/docs/api/subscriptions/v1/#definition-payment_method
 */
class PaymentMethod extends JsonSerializableArrayObject
{
    protected const PAYEE_PREFERRED = 'payee_preferred';
    protected const PAYER_SELECTED = 'payer_selected';
    protected const STANDARD_ENTRY_CLASS_CODE = 'standard_entry_class_code';

    const PAYEE_PREFERRED_UNRESTRICTED = 'UNRESTRICTED';
    const PAYEE_PREFERRED_IMMEDIATE = 'IMMEDIATE_PAYMENT_REQUIRED';

    const PAYER_SELECTED_PAYPAL = 'PAYPAL';

    const STANDARD_ENTRY_CLASS_CODE_TEL = 'TEL';
    const STANDARD_ENTRY_CLASS_CODE_WEB = 'WEB';
    const STANDARD_ENTRY_CLASS_CODE_CCS = 'CCD';
    const STANDARD_ENTRY_CLASS_CODE_PPD = 'PPD';

    /**
     * The merchant-preferred payment methods.
     *
     * @return string|null
     */
    public function getPayeePreferred(): ?string
    {
        return $this->{self::PAYEE_PREFERRED};
    }

    /**
     * @param string $method The merchant-preferred payment methods.
     * @return PaymentMethod
     * @throws ValueOutOfBoundsException
     */
    public function setPayeePreferred(string $method): PaymentMethod
    {
        switch ($method)
        {
            case self::PAYEE_PREFERRED_IMMEDIATE:
            case self::PAYEE_PREFERRED_UNRESTRICTED:
                $this->offsetSet(self::PAYEE_PREFERRED, $method);
                return $this;
        }

        throw new ValueOutOfBoundsException($method);
    }

    /**
     * The customer-selected payment method on the merchant site.
     *
     * @return string|null
     */
    public function getPayerSelected(): ?string
    {
        return $this->{self::PAYER_SELECTED};
    }

    /**
     * @param string $method The customer-selected payment method on the merchant site.
     * Currently only PAYPAL payment method is supported.
     *
     * @return $this
     * @throws ValueOutOfBoundsException
     */
    public function setPayerSelected(string $method): PaymentMethod
    {
        switch ($method)
        {
            case self::PAYER_SELECTED_PAYPAL:
                $this->offsetSet(self::PAYER_SELECTED, $method);
                return $this;
        }

        throw new ValueOutOfBoundsException($method);
    }

    /**
     * NACHA (the regulatory body governing the ACH network) requires that API callers (merchants, partners)
     * obtain the consumer’s explicit authorization before initiating a transaction.
     * To stay compliant, you’ll need to make sure that you retain a compliant authorization for each transaction
     * that you originate to the ACH Network using this API. ACH transactions are categorized (using SEC codes)
     * by how you capture authorization from the Receiver (the person whose bank account is being debited or credited).
     *
     * @return string|null
     */
    public function getStandardEntryClassCode(): ?string
    {
        return $this->{self::STANDARD_ENTRY_CLASS_CODE};
    }

    /**
     * NACHA (the regulatory body governing the ACH network) requires that API callers (merchants, partners)
     * obtain the consumer’s explicit authorization before initiating a transaction.
     * To stay compliant, you’ll need to make sure that you retain a compliant authorization for each transaction
     * that you originate to the ACH Network using this API. ACH transactions are categorized (using SEC codes)
     * by how you capture authorization from the Receiver (the person whose bank account is being debited or credited).
     *
     * The possible values are:
     *   TEL. The API caller (merchant/partner) accepts authorization and payment information from a consumer over the telephone.
     *   WEB. The API caller (merchant/partner) accepts Debit transactions from a consumer on their website.
     *   CCD. Cash concentration and disbursement for corporate debit transaction. Used to disburse or consolidate funds. Entries are usually Optional high-dollar, low-volume, and time-critical. (e.g. intra-company transfers or invoice payments to suppliers).
     *   PPD. Prearranged payment and deposit entries. Used for debit payments authorized by a consumer account holder, and usually initiated by a company. These are usually recurring debits (such as insurance premiums).
     *
     * @param string $code
     * @return $this
     * @throws ValueOutOfBoundsException
     */
    public function setStandardEntryClassCode(string $code): PaymentMethod
    {
        switch ($code)
        {
            case self::STANDARD_ENTRY_CLASS_CODE_TEL:
            case self::STANDARD_ENTRY_CLASS_CODE_WEB:
            case self::STANDARD_ENTRY_CLASS_CODE_CCS:
            case self::STANDARD_ENTRY_CLASS_CODE_PPD:
                $this->offsetSet(self::STANDARD_ENTRY_CLASS_CODE, $code);
                return $this;
        }

        throw new ValueOutOfBoundsException($code);
    }
}
