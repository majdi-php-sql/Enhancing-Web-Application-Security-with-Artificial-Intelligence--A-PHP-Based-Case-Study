<?php
// File: admin/controller/extension/module/secure_login_system.php

class ControllerExtensionModuleSecureLoginSystem extends Controller {
    public function index() {
        $this->load->language('extension/module/secure_login_system');
        $this->load->model('setting/setting');

        $this->document->setTitle($this->language->get('heading_title'));

        if ($this->request->server['REQUEST_METHOD'] == 'POST' && $this->validate()) {
            $this->model_setting_setting->editSetting('secure_login_system', $this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');
            $this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'], true));
        }

        $data['action'] = $this->url->link('extension/module/secure_login_system', 'user_token=' . $this->session->data['user_token'], true);
        $data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'], true);

        $data['secure_login_system_status'] = $this->config->get('secure_login_system_status');

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/module/secure_login_system', $data));
    }

    protected function validate() {
        if (!$this->user->hasPermission('modify', 'extension/module/secure_login_system')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        return !$this->error;
    }
}
