<?php if (!class_exists('CaptchaConfiguration')) { return; }

// BotDetect PHP Captcha configuration options
return [
    // Captcha configuration for example page
    'ContactCaptcha' => [
      'UserInputID' => 'captchaCode',
      'ImageWidth' => 250,
      'ImageHeight' => 50,
    ],

];