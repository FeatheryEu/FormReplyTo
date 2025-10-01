<?php declare(strict_types=1);

namespace Feathery\FormReplyTo\Subscriber;

use Shopware\Core\Content\MailTemplate\Service\Event\MailBeforeValidateEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class FormSubscriber implements EventSubscriberInterface
{
  public static function getSubscribedEvents(): array
  {
    return [
        // needs to be changed for SW 6.6.0
        MailBeforeValidateEvent::class => 'onMailBeforeValidateEvent',
    ];
  }

  // Set the replyTo header on emails from contact forms
  public function onMailBeforeValidateEvent(MailBeforeValidateEvent $event): void
  {
    $templateData = $event->getTemplateData();
    if (!$templateData) return;

    $contactEmail = $templateData['contactFormData']['email'] ?? null;
    if (!$contactEmail) return;

    $event->addData('replyTo', $contactEmail);
  }
}
