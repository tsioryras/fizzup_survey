<?php

namespace App\Http\Controllers;

use App\Models\Fizzup_customers;
use App\Models\Fizzup_pictures;
use App\Models\Fizzup_surveys;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    private $pictureFolder;

    /**
     * SurveyController constructor.
     */
    public function __construct()
    {
        $this->pictureFolder = public_path('storage/images/surveys/');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('_surveyForm');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listingSurvey(Request $request)
    {
        $notes = $request->input('note') ?? [];
        $surveys = Fizzup_surveys::all();
        if ($notes != null) {
            $surveys = Fizzup_surveys::whereIn('note', $notes)->get();
        }
        return view('surveyChart', ['surveys' => $surveys, 'selected' => $notes]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function postSurvey(Request $request)
    {
        $survey = new Fizzup_surveys();
        $request->validate([
            'email' => 'required|email',
            'pseudo' => 'required',
            'product_reference' => 'required'
        ]);
        $rating = $request->input('rating');
        $customer = Fizzup_customers::where('email', $request->input('email'))->first() ??
            Fizzup_customers::where('pseudo', $request->input('pseudo'))->first() ??
            new Fizzup_customers();
        if ($customer->id == null) {
            $customer->email = $request->input('email');
            $customer->pseudo = $request->input('pseudo');
            $customer->save();
        }

        $survey->comment = $request->input('comment');
        $survey->note = $rating == null ? 0 : (int)max($rating);
        $survey->customer()->associate($customer);
        $survey->save();
        $pictures = $request->file('survey_pictures');

        if ($pictures != null && $pictures != []) {
            foreach ($pictures as $picture) {
                $newFile = $picture->getPathname();
                $originalName = $picture->getClientOriginalName();
                $pictureLink = str_replace(' ', '', $request->input('reference')) . random_int(0, 1000) . $originalName;

                $surveyPicture = new Fizzup_pictures();
                trim(str_replace(["!", "$", "*", " ", ".", "\\", "/", "'", "~"], "", $pictureLink));
                $surveyPicture->link = $pictureLink;
                copy($newFile, $this->pictureFolder . $pictureLink);
                $surveyPicture->survey()->associate($survey);
                $surveyPicture->save();
            }
        }
        return redirect()->route('form_survey')->with('message', 'Votre avis a bien été enregistré! A bientôt');
    }
}
