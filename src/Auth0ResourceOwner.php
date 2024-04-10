<?php
/**
 * Created by PhpStorm.
 * User: webby
 * Date: 08/10/2018
 * Time: 5:43 AM
 */

namespace App;

use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

use HWI\Bundle\OAuthBundle\OAuth\ResourceOwner\GenericOAuth2ResourceOwner;

class Auth0ResourceOwner extends GenericOAuth2ResourceOwner
{
    /**
     * {@inheritdoc}
     */
    protected array $paths = ['identifier' => 'user_id', 'nickname' => 'nickname', 'realname' => 'name', 'email' => 'email', 'profilepicture' => 'picture'];

    /**
     * {@inheritdoc}
     */
    public function getAuthorizationUrl($redirectUri, array $extraParameters = [])
    {
        return parent::getAuthorizationUrl($redirectUri, array_merge(['audience' => $this->options['audience']], $extraParameters));
    }

    /**
     * {@inheritdoc}
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(['authorization_url' => '{base_url}/authorize', 'access_token_url' => '{base_url}/oauth/token', 'infos_url' => '{base_url}/userinfo', 'audience' => '{base_url}/userinfo']);

        $resolver->setRequired(['base_url']);

        $normalizer = fn(Options $options, $value) => str_replace('{base_url}', $options['base_url'], (string) $value);

        $resolver->setNormalizer('authorization_url', $normalizer);
        $resolver->setNormalizer('access_token_url', $normalizer);
        $resolver->setNormalizer('infos_url', $normalizer);
        $resolver->setNormalizer('audience', $normalizer);
    }
}