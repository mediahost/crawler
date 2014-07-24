<?php

namespace App\AdminModule\Presenters;

use Nette;
use Tracy\Debugger as Debug;

/**
 * Downloaded presenter.
 */
class DownloadedPresenter extends BasePresenter
{

    /** @var \App\Model\Facade\CvFacade @inject */
    public $cvFacade;

    /** @var array */
    public $cvs;

    /** @var \App\Model\Entity\Cv */
    private $cv;

    protected function startup()
    {
        parent::startup();
        $this->isAllowed("downloaded", "view");
        $this->isAllowed("cvs", "view");
    }

    public function actionDefault()
    {
        $this->cvs = $this->cvFacade->findAll();
    }

    public function renderDefault()
    {
        $this->template->cvs = $this->cvs;
    }

    public function actionView($id)
    {
        $this->flashMessage("Not implemented yet.", 'warning');
        $this->redirect("default");
    }

    public function actionDelete($id)
    {
        $this->isAllowed("cvs", "delete");

        $this->cv = $this->cvFacade->find($id);
        if ($this->cv) {
            $this->cvFacade->delete($this->cv);
            $this->flashMessage("Entity was deleted.", 'success');
        } else {
            $this->flashMessage("Entity was not found.", 'warning');
        }
        $this->redirect("default");
    }

}
