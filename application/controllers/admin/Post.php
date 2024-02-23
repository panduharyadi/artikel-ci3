<?php 

class Post extends CI_Controller
{
    // parent logic
    public function __construct()
    {
        parent::__construct();
        $this->load->model('article_model');
    }

    // get all
    public function index()
    {
        $data['articles'] = $this->article_model->get();
        if(count($data['articles']) <= 0)
        {
            $this->load->view('admin/post_empty');
        } else {
            $this->load->view('admin/post_list', $data);
        }
    }

    // insert data
    public function new()
    {
        if( $this->input->method() === 'post' )
        {
            // validasi
            $id = uniqid('', true); // generate uniq id
            $slug = url_title($this->input->post('title'), 'dash', TRUE) . '-' . $id;

            $article = [
                'id'      => $id,
                'title'   => $this->input->post('title'),
                'slug'    => $slug,
                'content' => $this->input->post('content'),
                'draft'   => $this->input->post('draft')
            ];

            $saved = $this->article_model->insert($article);

            if($saved)
            {
                $this->session->set_flashdata('message', 'Article was a created');
                return redirect('admin/post');
            }
        }

        $this->load->view('admin/post_new_form.php');
    }

    // update data
    public function edit($id = null)
    {
        $data['article'] = $this->article_model->find($id);

        if(!$data['article'] || !$id)
        {
            show_404();
        }

        if( $this->input->method() === 'post' )
        {
            // validasi
            $article = [
                'id'      => $id,
                'title'   => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'draft'   => $this->input->post('draft')
            ];

            $updated = $this->article_model->update($article);

            if($updated)
            {
                $this->session->set_flashdata('message', 'Article was updated');
                redirect('admin/post');
            }
        }

        $this->load->view('admin/post_edit_form.php', $data);
    }

    // delete data
    public function delete($id = null)
    {
        if(!$id)
        {
            show_404();
        }

        $deleted = $this->article_model->delete($id);
        if($deleted)
        {
            $this->session->set_flashdata('message', 'Data was deleted');
            redirect('admin/post');
        }
    }
}