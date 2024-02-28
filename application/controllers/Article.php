<?php 

class Article extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('article_model');    
    }

    public function index()
    {
        // ambil artikel yang statusnya bukan draft (aktif)
        $data['articles'] = $this->article_model->get_published();

        if(count($data['articles']) > 0) 
        {
            $this->load->view('articles/list_article.php', $data);
        } else {
            $this->load->view('articles/empty_article.php');
        }
    }

    public function show($slug = null)
    {
        // jika gaada slug tampilkan 404
        if(!$slug)
        {
            show_404();
        }

        // ambil artikel sesuai slug
        $data['article'] = $this->article_model->find_by_slug($slug);

        // jika articel gaada di dbs kasih 404
        if( !$data['article'] )
        {
            show_404();
        }

        // tampil artikel
        $this->load->view('articles/show_article.php', $data);
    }
}

?>

