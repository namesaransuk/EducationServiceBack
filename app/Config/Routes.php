<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Student');
$routes->setDefaultController('EducationStudent');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/students', 'student::getAllStudent');
$routes->get('/students/(:num)', 'student::getStudent/$1');
$routes->post('/students', 'student::addStudent');
$routes->put('/students/(:num)', 'student::updateProfileStudent/$1');

$routes->get('/EducationStudent', 'EducationStudent::getAllEducation');
$routes->get('/EducationStudent/(:num)', 'EducationStudent::getEducation/$1');
$routes->post('/EducationStudent', 'EducationStudent::addEducationStudent');
$routes->put('/EducationStudent/(:num)', 'EducationStudent::updateEducationStudent/$1');

$routes->post("/Login", "Login::index");
$routes->get("/Title", "Title::getTitle");

$routes->get("/Curriculum", "Curriculum::getCurriculum");

$routes->get("/University", "University::getUniversityAll");
$routes->get('/university', 'University::index');
$routes->get('/university/(:num)', 'University::getUniversity/$1');
$routes->post('/university', 'University::createUniversity');
$routes->put('/university/(:num)', 'University::updateUniversity/$1');

$routes->get('/faculty', 'Faculty::index');
$routes->get('/faculty', 'Faculty::getFacultyAll');
$routes->get('/faculty/(:num)', 'Faculty::getFaculty/$1');
$routes->post('/faculty', 'Faculty::createFaculty');
$routes->put('/faculty/(:num)', 'Faculty::updateFaculty/$1');

$routes->get('/Course', 'Course::index');
$routes->get('/Course/(:num)', 'Course::getCourse/$1');
$routes->get('/Course', 'Course::getCoruseAll');
$routes->post('/Course', 'Course::createCourse');
$routes->put('/Course/(:num)', 'Course::updateCourse/$1');

$routes->get('/groupmajor', 'GroupMajor::index');
$routes->get('/groupmajor/(:num)', 'GroupMajor::getGroupMajor/$1');
$routes->post('/groupmajor', 'GroupMajor::createGroupMajor');
$routes->put('/groupmajor/(:num)', 'GroupMajor::updateGroupMajor/$1');

$routes->get('/degree', 'Degree::index');
$routes->get('/degree/(:num)', 'Degree::getDegree/$1');
$routes->post('/degree', 'Degree::createDegree');
$routes->put('/degree/(:num)', 'Degree::updateDegree/$1');

//Education
$routes->post('/createEducation','Education::createEducation');
$routes->put('/updateEducation/(:num)', 'Education::updateEducation/$1');
$routes->delete('/deleteEducation/(:num)','Education::deletedEducation/$1');
$routes->get('/getEducation','Education::getEducation');
$routes->get('/Education/(:num)','Education::getEducatioById/$1');

//EducationDetail
$routes->get('/eduDetail', 'eduDetail::index');
$routes->post('/createEduDetail','eduDetail::createEduDetail');
$routes->put('/updateEduDetail/(:num)','eduDetail::updateEduDetail/$1');
$routes->get('/getEduDetail','eduDetail::getEduDetail');
$routes->get('/eduDetail/(:num)','eduDetail::getEduDetailById/$1');
$routes->get('/eduDetail/ByIdeducation/(:num)','eduDetail::getEduDetailByIdeducation/$1');

$routes->post('/createEduCondition','EduCondition::createEduCondition');
$routes->put('/updateEduCondition/(:num)', 'EduCondition::updateEduCondition/$1');

$routes->get("/EducationData", "EducationData::getAllEducationData");
$routes->get('/EducationData/(:num)', 'EducationData::getEducationdataid/$1');
$routes->get('/EducationData', 'EducationData::SearchEducation');
// $routes->get('/EducationData', 'EducationData::Search2');

$routes->get('/Teacher', 'Teacher::getYear');
$routes->get('/Teacher', 'Teacher::getClass');
$routes->get('/Teacher', 'Teacher::getStudentClass');
$routes->get('/Teacher', 'Teacher::getYearClass');

//Round
$routes->get('/Round', 'Round::index');
$routes->get('/Round/(:num)', 'Round::getEducatioById/$1');

//AdminTeacher
$routes->post('/Staff', 'Staff::AddTeacher');
$routes->get('/Staff', 'Staff::getAllStaff');
$routes->get('/Staff/(:num)', 'Staff::DeleteStaff/$1');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
