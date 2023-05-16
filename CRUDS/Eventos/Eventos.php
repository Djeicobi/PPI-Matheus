<?php 

    class Evento{

        private $ID_Evento;
        private $nome;
        private $data;
        private $valor_fotos;

        
        public function getIDEvento()
        {
                return $this->ID_Evento;
        }

       
        public function setIDEvento($ID_Evento): self
        {
                $this->ID_Evento = $ID_Evento;

                return $this;
        }

       
        public function getNome()
        {
                return $this->nome;
        }

       
        public function setNome($nome): self
        {
                $this->nome = $nome;

                return $this;
        }

       
        public function getData()
        {
                return $this->data;
        }

        
        public function setData($data): self
        {
                $this->data = $data;

                return $this;
        }

       
        public function getValorFotos()
        {
                return $this->valor_fotos;
        }

       
        public function setValorFotos($valor_fotos): self
        {
                $this->valor_fotos = $valor_fotos;

                return $this;
        }
    }
?>