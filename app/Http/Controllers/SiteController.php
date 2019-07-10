<?php

namespace App\Http\Controllers;

use App\Classification;
use App\Country;
use App\Document;
use App\Formation;
use App\FormationType;
use App\Founder;
use App\Gallery;
use App\Http\Requests\MailRequest;
use App\Mail\Contact;
use App\Modality;
use App\Organization;
use App\SearchContent;
use App\Topic;
use App\WorkArea;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    protected $formation;
    protected $searchContent;
    protected $document;
    protected $organization;
    protected $country;
    protected $topic;
    protected $classification;
    protected $workArea;
    protected $founder;
    protected $gallery;
    protected $modality;
    protected $formationType;

    public function __construct(
            Formation $formation,
            Document $document,
            Organization $organization,
            Country $country,
            Topic $topic,
            Classification $classification,
            WorkArea $workArea,
            Founder $founder,
            Gallery $gallery,
            Modality $modality,
            FormationType $formationType,
            SearchContent $searchContent)
    {
        $this->formation      = $formation;
        $this->document       = $document;
        $this->organization   = $organization;
        $this->country        = $country;
        $this->topic          = $topic;
        $this->classification = $classification;
        $this->workArea       = $workArea;
        $this->founder        = $founder;
        $this->gallery        = $gallery;
        $this->modality       = $modality;
        $this->formationType  = $formationType;
        $this->searchContent  = $searchContent;
    }

    public function home()
    {
        $formations    = $this->formation->where('active', 1)->limit(6)->get();
        $documents     = $this->document->where('active', 1)->limit(6)->get();
        $organizations = $this->organization->where('active', 1)->limit(6)->get();

        return view('site.home', compact('formations', 'documents', 'organizations'));
    }

    public function about()
    {
        $founders  = $this->founder->all();
        $galleries = $this->gallery->all();

        return view('site.about', compact('founders', 'galleries'));
    }

    public function repositories()
    {
        $topics = $this->topic->all();

        return view('site.repositories', compact('topics'));
    }

    public function document(Document $document)
    {
        return view('site.details.document', compact('document'));
    }

    public function create_document()
    {
        $isos          = ['SV', 'GT', 'HN', 'CR', 'PA', 'NI', 'MX'];
        $countries     = $this->country->whereIn('iso', $isos)->get();
        $topics        = $this->topic->all();
        $organizations = $this->organization->all();

        return view('site.forms.document', compact('countries', 'topics', 'organizations'));
    }

    public function organizations()
    {
        $workareas       = $this->workArea->all();
        $classifications = $this->classification->all();

        return view('site.organizations', compact('workareas', 'classifications'));
    }

    public function organization(Organization $organization)
    {
        return view('site.details.organization', compact('organization'));
    }

    public function create_organization()
    {
        $isos            = ['SV', 'GT', 'HN', 'CR', 'PA', 'NI', 'MX'];
        $classifications = $this->classification->all();
        $work_areas      = $this->workArea->all();
        $countries       = $this->country->whereIn('iso', $isos)->get();

        return view('site.forms.organization', compact('classifications', 'work_areas', 'countries'));
    }

    public function formations()
    {
        $modalities = $this->modality->all();
        $types      = $this->formationType->all();

        return view('site.formations', compact('modalities', 'types'));
    }

    public function formation(Formation $formation)
    {
        return view('site.details.formation', compact('formation'));
    }

    public function create_formation()
    {
        $isos       = ['SV', 'GT', 'HN', 'CR', 'PA', 'NI', 'MX'];
        $modalities = $this->modality->all();
        $countries  = $this->country->whereIn('iso', $isos)->get();
        $types      = $this->formationType->all();

        return view('site.forms.formation', compact('modalities', 'countries', 'types'));
    }

    public function contact()
    {
        return view('site.contact');
    }

    public function search(Request $request)
    {
        $query           = $request->get('q');
        $search_contents = $this->searchContent
                                ->where('active', 1)
                                ->search($query)
                                ->paginate(25);

        return view('site.search', compact('search_contents', 'search', 'query'));
    }

    public function mail(MailRequest $request)
    {
        $email = app('voyager')->setting('contact_email');
        $send  = \Mail::to($email)->send(new Contact($request));

        if (! \Mail::failures()) {
            return redirect(route('contact'))->with('success', 'success send');
        }

        return back();
    }
}
