<?php


class AttendanceCsvFactory
{
    public function getImportClassInstance($importType){

        if($importType == 'pim'){
            return new PimCsvDataImport();
        }
        elseif($importType == 'attendance'){
            return new AttendanceImportCsv();
        }
    }
}