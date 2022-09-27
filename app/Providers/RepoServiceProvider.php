<?php

namespace App\Providers;

use App\Repository\AttendanceRepositoryInterface;
use App\Repository\PaymentRepositoryInterface;
use App\Repository\ProcessingRepositoryInterface;
use App\Repository\QuizzeRepositoryInterface;
use App\Repository\StudentGraduatedRepositoryInterface;
use App\Repository\SubjectRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
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
            'App\Repository\TeacherRepository'

        );
        $this->app->bind(
            'App\Repository\StudentRepositoryInterface',
            'App\Repository\StudentRepository'

        );
        $this->app->bind(
            'App\Repository\StudentPromotionRepositoryInterface',
            'App\Repository\StudentPromotionRepository'

        );
        $this->app->bind(
            'App\Repository\StudentGraduatedRepositoryInterface',
            'App\Repository\StudentGraduatedRepository'

        );

        $this->app->bind(
            'App\Repository\FessRepositoryInterface',
            'App\Repository\FessRepository'

        );
        $this->app->bind(
            'App\Repository\FeeInvoicesRepositoryInterface',
            'App\Repository\FeeInvoicesRepository'

        );
        $this->app->bind(
            'App\Repository\ReceiptStudentsRepositoryInterface',
            'App\Repository\ReceiptStudentsRepository'

        );
        $this->app->bind(
            'App\Repository\ProcessingRepositoryInterface',
            'App\Repository\ProcessingRepository'

        );

        $this->app->bind(
            'App\Repository\PaymentRepositoryInterface',
            'App\Repository\PaymentRepository'

        );

        $this->app->bind(
            'App\Repository\AttendanceRepositoryInterface',
            'App\Repository\AttendanceRepository'

        );

        $this->app->bind(
            'App\Repository\SubjectRepositoryInterface',
            'App\Repository\SubjectRepository'

        );

        $this->app->bind(
            'App\Repository\QuizzeRepositoryInterface',
            'App\Repository\QuizzeRepository'

        );
        $this->app->bind(
            'App\Repository\QuestionRepositoryInterface',
            'App\Repository\QuestionRepository'

        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
