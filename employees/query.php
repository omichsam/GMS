<?php


$sql = "SELECT tblleaves.id as lid,tblemployees.FirstName,tblemployees.LastName,tblemployees.EmpId,
tblemployees.id,tblleaves.LeaveType,tblleaves.PostingDate,tblleaves.Status from tblleaves join
 tblemployees on tblleaves.empid=tblemployees.id order by lid desc limit 7";


$sql = "SELECT tblvisitors.FullName as FullName,tblvisitors.Phone, tblvisitors.gender,tblvisitors.is_kenyan,
tblvisitorlog.VisitorID,tblvisitorlog.department,tblvisitorlog.office,tblvisitorlog.Purpose from tblvisitors join
tblvisitorlog on tblvisitorlog.VisitorID=tblemployees.cardNo where tblvisitorlog.id=:lid";


"SELECT `id`, `VisitorID`, `StaffID`, `CheckingInTime`, `CheckingOutTime`, `Purpose`, `remark`,
 `department`, `office`, `FullName`, `status` FROM `tblvisitorlog` WHERE 1";

"SELECT `id`, `FullName`, `Email`, `Phone`, `gender`, `cardNo`, `is_kenyan`, `created`
  FROM `tblvisitors` WHERE 1";


$sql = "SELECT tblleaves.id as lid,tblemployees.FirstName,tblemployees.LastName,
tblemployees.EmpId,tblemployees.id,tblemployees.Gender,tblemployees.Phonenumber,tblemployees.EmailId,
tblleaves.LeaveType,tblleaves.ToDate,tblleaves.FromDate,tblleaves.Description,tblleaves.PostingDate,
tblleaves.Status,tblleaves.AdminRemark,tblleaves.AdminRemarkDate from tblleaves join 
tblemployees on tblleaves.empid=tblemployees.id where tblleaves.id=:lid";
