<?php declare(strict_types=1);

namespace Feathery\FormReplyTo;

use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\InstallContext;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;

class FormReplyToCS extends Plugin
{
  public function install(InstallContext $installContext): void
  {
  }

  public function uninstall(UninstallContext $uninstallContext): void
  {
    if ($uninstallContext->keepUserData()) {
      return;
    }
  }
}
