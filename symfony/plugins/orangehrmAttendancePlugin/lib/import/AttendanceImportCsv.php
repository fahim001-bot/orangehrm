<?php


class AttendanceImportCsv extends AttendanceCsvAbstract
{

    public function importAttendanceCsv($data) {

        $employee_id = $data[0];
        $punchInDate = $data[1];
        $punchOutDate = $data[2];
        $state = $data[3];

        $attendance = new AttendanceRecord();
        $isAttendanceRecordExist = $attendance->checkAttendanceMarkedAlready($employee_id, $punchInDate, $punchOutDate);
        if($isAttendanceRecordExist[0]['state'] == 'PUNCHED IN' || $isAttendanceRecordExist[0]['state'] == 'PUNCHED OUT'){

            return false;
        }

        $attendance->setEmployeeId($employee_id);
        if(!empty($punchInDate)){
            $attendance->setPunchInUtcTime($punchInDate);
            $attendance->setPunchInUserTime($punchInDate);
        }
        if(!empty($punchOutDate)){
            $attendance->setPunchOutUtcTime($punchOutDate);
            $attendance->setPunchOutUserTime($punchOutDate);
        }
        $attendance->setState($state);
        $attendance->save();
        return true;
    }
    public function import($data)
    {
        // TODO: Implement import() method.
    }
}