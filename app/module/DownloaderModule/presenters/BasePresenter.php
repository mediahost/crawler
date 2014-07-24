<?php

namespace App\DownloaderModule\Presenters;

use Nette,
    App\BaseModule\Presenters\BasePresenter as BaseBasePresenter;

/**
 * BasePresenter
 *
 * @author Petr Poupě
 */
abstract class BasePresenter extends BaseBasePresenter
{
    
    /** @var Nette\Http\IRequest @inject */
    public $httpRequest;
    
    protected function startup()
    {
        parent::startup();
        $this->isAllowedIp();
    }

    protected function isAllowedIp($redirect = TRUE)
    {
        $config = Nette\Environment::getConfig()->downloader;
        
        $isAllowed = in_array($this->httpRequest->getRemoteAddress(), (array) $config->ips);
        if ($redirect && !$isAllowed) {
            $this->flashMessage("You can't access to this section", "warning");
            $this->redirect(":Front:Deny:");
        }
        return $isAllowed;
    }

}
