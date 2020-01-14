<?php


class uploadAttendanceAction extends baseCsvImportAction
{
    /**
     * @param sfForm $form
     * @return
     */
    public function setForm(sfForm $form) {
        if (is_null($this->form)) {
            $this->form = $form;
        }
    }

    public function execute($request) {

        $this->setForm(new AttendanceCsvImportForm());
        if ($request->isMethod('post')) {

            $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));

            if ($_FILES['attendanceCsvImport']['size']['csvFile'] > 1024000 || $_FILES == null) {
                $this->getUser()->setFlash('csvimport.warning', __('Failed to Import: File Size Exceeded'));
                $this->redirect('attendance/uploadAttendance');
            }

            if (empty($_FILES['attendanceCsvImport']['name']['csvFile'])) {

                $this->getUser()->setFlash('csvimport.warning', __('Please Select a file to import data'));
                $this->redirect('attendance/uploadAttendance');
            }

            if ($this->form->isValid()) {
                $result = $this->form->save();

                if (isset($result['messageType'])) {

                    $this->messageType = $result['messageType'];
                    $this->message = $result['message'];
                    $this->getUser()->setFlash($result['messageType'], $result['message']);
                } else {
                    if($result != 0) {
                        $this->getUser()->setFlash('csvimport.success', __('Number of Records Imported').": ".$result);
                    } else {
                        $this->getUser()->setFlash('csvimport.warning', __('No Compatible Records Found'));
                    }
                    $this->redirect('attendance/uploadAttendance');
                }
            } else {
                $this->handleBadRequest();
                $this->getUser()->setFlash('csvimport.warning', __(TopLevelMessages::VALIDATION_FAILED), false);
            }
        }
    }
}