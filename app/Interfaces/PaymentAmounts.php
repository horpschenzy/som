<?php
namespace  App\Interfaces;

interface PaymentAmounts {
    const ONE_OFF = 1030000;
    const ONE_OFF_LATE = 1540000;
    const SMALL_INSTALLMENT = 520000;
    const BIG_INSTALLMENT = 99999999999999999;
    const TWO_SMALL_INSTALLMENTS = 1040000;
    const TWO_INSTALLMENT_TOTAL = 1030000;
    const TWO_INSTALLMENT_TOTAL_LATE = 1540000;
    const THREE_INSTALLMENT_TOTAL = 99999999999999999;
}