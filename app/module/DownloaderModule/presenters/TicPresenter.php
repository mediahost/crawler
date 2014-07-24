<?php

namespace App\DownloaderModule\Presenters;

use Nette;
use Tracy\Debugger as Debug;

/**
 * Default presenter.
 */
class TicPresenter extends BasePresenter
{

    private $exitStatus = "OK";

    public function actionDefault()
    {
        $this->redirect("download");
    }

    public function actionDownload()
    {
        
    }

    public function renderDownload()
    {
        $this->template->status = $this->exitStatus;
    }

}
