<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(
            'App\Repository\TeacherRepositoryInterface',
            'App\Repository\TeacherRepository');

        $this->app->bind(
            'App\Repository\StudentRepositoryInterface',
            'App\Repository\StudentRepository',
        );
        $this->app->bind(
            'App\Repository\FeesRepositoryInterface',
            'App\Repository\FeesRepository',
        );  
           $this->app->bind(
            'App\Repository\Fee_invoicesRepositoryInterface',
            'App\Repository\Fee_invoicesRepository',
        );
        $this->app->bind(
            'App\Repository\RecieptStudentRepositoryInterface',
            'App\Repository\RecieptStudentRepository',
        );
        $this->app->bind(
            'App\Repository\AttendenceRepositoryInterface',
            'App\Repository\AttendenceRepository',
        );

        $this->app->bind(
            'App\Repository\SubjectRepositoryInterface',
            'App\Repository\SubjectRepository',
        );

            $this->app->bind(
            'App\Repository\ExamRepositoryInterface',
            'App\Repository\ExamRepository',
        );   
            $this->app->bind(
            'App\Repository\QuizRepositoryInterface',
            'App\Repository\QuizRepository',
        );

        $this->app->bind(
            'App\Repository\QuestionRepositoryInterface',
            'App\Repository\QuestionRepository',
        );

        $this->app->bind(
            'App\Repository\LibraryRepositoryInterface',
            'App\Repository\LibraryRepository',
        );
        
        $this->app->bind(
            'App\Repository\RecieptStudentRepositoryInterface',
            'App\Repository\RecieptStudentRepository',
        );

        
        $this->app->bind(
            'App\Repository\FundAccountInterface',
            'App\Repository\FundAccount',
        );

        $this->app->bind(
            'App\Repository\ProcessFeesRepositoryInterface',
            'App\Repository\ProcessFeesRepository',
        );
        
        }
    

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
}
