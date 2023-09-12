<?php

const AES_CIPHER_ALGORITHM = 'aes-256-cbc';
const HMAC_ALGORITHM = 'sha256';
const CREATE_TRANSACTION_PATH = '/api/payment/v1/create';
const CANCEL_TRANSACTION_PATH = '/api/payment/v1/cancel';
const CHECK_TRANSACTION_PATH = '/api/payment/v1/check';


const CHECK_ACCOUNT_NO_PATH = '/api/openBanking/v1/checkAccountNo';
const LINK_ACCOUNT_PATH = '/api/openBanking/v1/linkAccount';
const LINK_ACCOUNT_VERIFY_PATH = '/api/openBanking/v1/linkAccount/verifyAccountNo';


const ENABLE_VIRTUAL_ACCOUNT = '/api/payment/v1/virtualAccount/enable';
const DISABLE_VIRTUAL_ACCOUNT = '/api/payment/v1/virtualAccount/disable';
const GET_TRANSACTION = '/api/payment/v1/getTransaction';
