<?php
/**
 * @package Basic App System
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\System\Models;

use BasicApp\Core\DatabaseConfigModel;
use PHPMailer\PHPMailer\PHPMailer;

abstract class BaseMessageConfigModel extends DatabaseConfigModel
{

    const REPLY_TO_NONE = '';
    const REPLY_TO_ADMIN = 'admin';
    const REPLY_TO_FROM = 'from';

    protected $returnType = MessageConfig::class;

    protected $validationRules = [
        'from_name' => 'max_length[255]',
        'from_email' => 'max_length[255]|valid_email|required',
        'smtp_enabled' => 'is_natural',
        'smtp_host' => 'max_length[255]',
        'smtp_username' => 'max_length[255]',
        'smtp_password' => 'max_length[255]',
        'smtp_secure' => 'max_length[255]',
        'smtp_port' => 'is_natural',
        'encoding' => 'max_length[255]',
        'charset' => 'max_length[255]',
        'reply_to_type' => 'max_length[255]',
        'admin_email' => 'max_length[255]|valid_email',
        'admin_name' => 'max_length[255]'
    ];

    protected static $fieldLabels = [
        'from_name' => 'From Name',
        'from_email' => 'From E-mail',
        'smtp_enabled' => 'Use SMTP',
        'smtp_host' => 'SMTP Host',
        'smtp_port' => 'SMTP Port',
        'smtp_username' => 'SMTP Username',
        'smtp_password' => 'SMTP Password',
        'smtp_secure' => 'SMTP Encryption',
        'encoding' => 'Encoding',
        'charset' => 'Charset',
        'reply_to_type' => 'Reply To',
        'admin_name' => 'Admin Name',
        'admin_email' => 'Admin E-mail'
    ];

    public static function getFormName()
    {
        return t('admin.menu', 'E-mail');
    }

    public static function getFormFields($model)
    {
        return [
            [
                'type' => 'text',
                'name' => 'from_name',
                'label' => static::fieldLabel('from_name'),
                'value' => $model->from_name
            ],
            [
                'type' => 'text',
                'name' => 'from_email',
                'label' => static::fieldLabel('from_email'),
                'value' => $model->from_email
            ],
            [
                'type' => 'select',
                'name' => 'reply_to_type',
                'label' => static::fieldLabel('reply_to_type'),
                'value' => $model->reply_to_type,
                'items' => static::replyToTypeItems([static::REPLY_TO_NONE => '...'])
            ],            
            [
                'type' => 'text',
                'name' => 'admin_name',
                'label' => static::fieldLabel('admin_name'),
                'value' => $model->admin_name
            ],         
            [
                'type' => 'text',
                'name' => 'admin_email',
                'label' => static::fieldLabel('admin_email'),
                'value' => $model->admin_email
            ],
            [
                'type' => 'select',
                'name' => 'charset',
                'label' => static::fieldLabel('charset'),
                'value' => $model->charset,
                'items' => static::charsetItems(['' => '...'])
            ],
            [
                'type' => 'select',
                'name' => 'encoding',
                'label' => static::fieldLabel('encoding'),
                'value' => $model->encoding,
                'items' => static::encodingItems(['' => '...'])
            ],
            [
                'type' => 'checkbox',
                'name' => 'smtp_enabled',
                'label' => static::fieldLabel('smtp_enabled'),
                'value' => $model->smtp_enabled
            ],
            [
                'type' => 'text',
                'name' => 'smtp_host',
                'label' => static::fieldLabel('smtp_host'),
                'value' => $model->smtp_host
            ],
            [
                'type' => 'text',
                'name' => 'smtp_port',
                'label' => static::fieldLabel('smtp_port'),
                'value' => $model->smtp_port
            ],
            [
                'type' => 'text',
                'name' => 'smtp_username',
                'label' => static::fieldLabel('smtp_username'),
                'value' => $model->smtp_username
            ],
            [
                'type' => 'password',
                'name' => 'smtp_password',
                'label' => static::fieldLabel('smtp_password'),
                'value' => $model->smtp_password
            ],
            [
                'type' => 'select',
                'name' => 'smtp_secure',
                'label' => static::fieldLabel('smtp_secure'),
                'value' => $model->smtp_secure,
                'items' => static::smtpSecureItems(['' => '...'])
            ]                                      
        ];
    }

    public static function smtpSecureItems(array $return = [])
    {
        $return['tls'] = 'TLS';
        $return['ssl'] = 'SSL';

        return $return;
    }

    public static function encodingItems(array $return = [])
    {
        $return[PHPMailer::ENCODING_7BIT] = PHPMailer::ENCODING_7BIT;
        $return[PHPMailer::ENCODING_8BIT] = PHPMailer::ENCODING_8BIT;
        //$return['16bit'] = '16bit'; // not tested
        $return[PHPMailer::ENCODING_BASE64] = PHPMailer::ENCODING_BASE64;
        $return[PHPMailer::ENCODING_BINARY] = PHPMailer::ENCODING_BINARY;
        $return[PHPMailer::ENCODING_QUOTED_PRINTABLE] = PHPMailer::ENCODING_QUOTED_PRINTABLE;

        return $return;
    }

    public static function charsetItems(array $return = [])
    {
        $return[PHPMailer::CHARSET_UTF8] =  PHPMailer::CHARSET_UTF8;
        $return[PHPMailer::CHARSET_ISO88591] = PHPMailer::CHARSET_ISO88591;

        return $return;
    }

    public static function replyToTypeItems(array $return = [])
    {
    	$return[static::REPLY_TO_FROM] = t('message', 'Reply-To Sender');
    	$return[static::REPLY_TO_ADMIN] = t('message', 'Reply-To Admin');

    	return $return;
    }

}