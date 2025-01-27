<?php

namespace App\Http\Controllers\Admin;

use App\Enums\QuestionnaireGrade;
use App\Enums\QuestionnaireLanguage;
use App\Enums\QuestionnaireSource;
use App\Exports\QuestionnairesExport;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\QuestionnaireRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use Maatwebsite\Excel\Excel;
use StarterKit\Core\Traits\AdminBase;

class QuestionnaireController extends Controller
{
    use AdminBase;

    private Excel $excel;

    public function __construct(QuestionnaireRepository $repository, Excel $excel)
    {
        $this->repository = $repository;
        $this->excel = $excel;
    }

    public function initConfig(): array
    {
        return [
            'title' => [
                'list' => 'Анкеты на поступление',
                'create' => 'Создать анкету',
                'edit' => 'Редактировать анкету',
            ],
            'route' => [
                'index' => 'admin.questionnaires.index',
                'list' => 'admin.questionnaires.list',
                'create' => 'admin.questionnaires.create',
                'store' => 'admin.questionnaires.store',
                'edit' => 'admin.questionnaires.edit',
                'update' => 'admin.questionnaires.update',
                'delete' => 'admin.questionnaires.delete',
                'export' => 'admin.questionnaires.export',
            ],
            'view' => [
                'index' => 'admin.questionnaires.index',
                'list' => 'admin.questionnaires.list',
                'form' => 'admin.questionnaires.form',
                'item' => 'admin.questionnaires.item',
            ],
        ];
    }

    public function validationRules(): array
    {
        return [
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'string', 'max:255'],
            'grade' => ['required', new Enum(QuestionnaireGrade::class)],
            'language' => ['required', new Enum(QuestionnaireLanguage::class)],
            'school' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'source' => ['required', new Enum(QuestionnaireSource::class)],
            'parent_name' => ['required', 'string', 'max:255'],
        ];
    }

    public function list(Request $request): JsonResponse
    {
        $this->items = $this->repository->order('created_at', 'desc')->withDataFilter($request);

        return $this->listResponse();
    }

    public function export()
    {
        return $this->excel->download(new QuestionnairesExport, 'questionnaires.xlsx');
    }
}
