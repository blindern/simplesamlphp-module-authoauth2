<?php

namespace SimpleSAML\Module\authoauth2;

class ConfigTemplate {

    const Facebook = [
        'authoauth2:OAuth2',
        // *** Facebook endpoints ***
        'urlAuthorize' => 'https://www.facebook.com/dialog/oauth',
        'urlAccessToken' => 'https://graph.facebook.com/oauth/access_token',
        // Add requested attributes as fields
        'urlResourceOwnerDetails' => 'https://graph.facebook.com/me?fields=id,name,first_name,last_name,email',
        // Custom query parameters to add request email
        'urlAuthorizeOptions' => [
            // request email access
            'req_perm' => 'email',
        ],
        // Prefix attributes so we can use the facebook2name
        'attributePrefix' => 'facebook.',

        // Improve log lines
        'label' => 'facebook'
    ];

    const GoogleOIDC = [
        'authoauth2:OAuth2',
        // *** Google Endpoints ***
        'urlAuthorize' => 'https://accounts.google.com/o/oauth2/auth',
        'urlAccessToken' => 'https://accounts.google.com/o/oauth2/token',
        'urlResourceOwnerDetails' => 'https://www.googleapis.com/oauth2/v3/userinfo',

        'scopes' =>  array(
            'openid',
            'email',
            'profile'
        ),
        'scopeSeparator' => ' ',
        // Prefix attributes so we can use the standard oidc2name attributemap
        'attributePrefix' => 'oidc.',

        // Improve log lines
        'label' => 'google'
    ];

    const LinkedIn = [
        'authoauth2:OAuth2',
        // *** LinkedIn Endpoints ***
        'urlAuthorize' => 'https://www.linkedin.com/oauth/v2/authorization',
        'urlAccessToken' => 'https://www.linkedin.com/oauth/v2/accessToken',
        'urlResourceOwnerDetails' => 'https://api.linkedin.com/v1/people/~?format=json',
        //scopes are the default ones configured for your application
        'attributePrefix' => 'linkedin.',

        // Improve log lines
        'label' => 'linkedin'
    ];

    //https://docs.microsoft.com/en-us/azure/active-directory/develop/v2-protocols-oidc
    //https://login.microsoftonline.com/common/v2.0/.well-known/openid-configuration
    // WARNING: The OIDC user resource endpoint only returns sub, which is a targeted id.
    // You must decode the id token instead to determine user attributes. There you will
    // find oid which is the ID you are probably expecting if you are moving from the live apis.
    const MicrosoftOIDC = [
        'authoauth2:OAuth2',
        // *** Microsoft oidc Endpoints ***
        'urlAuthorize' => 'https://login.microsoftonline.com/common/oauth2/v2.0/authorize',
        'urlAccessToken' => 'https://login.microsoftonline.com/common/oauth2/v2.0/token',
        'urlResourceOwnerDetails' => 'https://graph.microsoft.com/oidc/userinfo',
        'attributePrefix' => 'oidc.',
        'scopes' => ['openid', 'email', 'profile'],
        'scopeSeparator' => ' ',

        // Improve log lines
        'label' => 'microsoft'
    ];

    const MicrosoftGraphV1 = [
        'authoauth2:OAuth2',
        // *** Microsoft graph Endpoints ***
        'urlAuthorize' => 'https://login.microsoftonline.com/common/oauth2/v2.0/authorize',
        'urlAccessToken' => 'https://login.microsoftonline.com/common/oauth2/v2.0/token',
        'urlResourceOwnerDetails' => 'https://graph.microsoft.com/v1.0/me/',
        'attributePrefix' => 'microsoft.',
        'scopes' => ['openid', 'email', 'profile', 'user.read'],
        'scopeSeparator' => ' ',

        // Improve log lines
        'label' => 'microsoft'
    ];

    const YahooOIDC = [
        'authoauth2:OAuth2',
        // *** Yahoo Endpoints ***
        'urlAuthorize' => 'https://api.login.yahoo.com/oauth2/request_auth',
        'urlAccessToken' => 'https://api.login.yahoo.com/oauth2/get_token',
        'urlResourceOwnerDetails' => 'https://api.login.yahoo.com/openid/v1/userinfo',
        'scopes' =>  array(
            'openid',
// Yahoo doesn't support standard OIDC claims, like email and profile
//          'email',
//          'profile',
// Yahoo prefers the sdpp-w scope for getting acess to user's email, however it prompts user for write access. Leaving it
// out makes things work fine IF you picked being able to edit private profile when creating your app
//            'sdpp-w',
        ),
        'scopeSeparator' => ' ',
        // Prefix attributes so we can use the standard oidc2name attributemap
        'attributePrefix' => 'oidc.',

        // Improve log lines
        'label' => 'yahoo'
    ];
}