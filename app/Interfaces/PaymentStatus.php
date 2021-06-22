<?php
namespace  App\Interfaces;

interface PaymentStatus {
    const PAID = 'paid';
    const PARTLY_PAID = 'partly_paid';
    const UNPAID = 'unpaid';
}