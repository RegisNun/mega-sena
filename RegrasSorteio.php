<?php


class RegrasSorteio
{
    private $quantidadeDezenas = 0;
    private $resultado = [];
    private $totalJogos = 0;
    private $jogos = [];




    public function __construct($quantidadeDezenas=0, $totalJogos=0)
    {

        $this->quantidadeDezenas = $quantidadeDezenas;
        $this->totalJogos = $totalJogos;
    }

    public function setQuantidadeDezenas($qtdd)
    {

        if ($qtdd < 6 || $qtdd > 11) {

            die("A quantidade de dezenas deve 6, 7, 8, 9 ou 10. ");
        } else {
            $this->quantidadeDezenas = $qtdd;
        }
    }

    public function getQuantidadeDezenas()
    {
        return $this->quantidadeDezenas;
    }

    public function getResultado()
    {
        return $this->resultado;
    }

    public  function setResultado($result)
    {
        $this->resultado = $result;
    }

    public function getTotalJogos()
    {
        return  $this->totalJogos;
    }


    public function setTotalJogos($totalJogos)
    {

        $this->totalJogos = $totalJogos;
    }

    public function getJogos()
    {
        return  $this->jogos;
    }

    public function setJogos($sj)
    {
        return  $this->jogos = $sj;
    }

    public function addJogos($id)
    {
        array_push($this->jogos, [
            'Id' => $id,
            'Jogo' => $this->gerarJogo()
        ]);
    }

    private function gerarJogo()
    {
        $arrayjogo = [];
        while (count($arrayjogo) < $this->quantidadeDezenas) {
            sort($arrayjogo);
            $gera = rand(1, 60);

            $key = array_search($gera, $arrayjogo);
            if (!$key) {
                array_push($arrayjogo, $gera);
            }
        }

        return $arrayjogo;
    }

    public function geraJogos()
    {
        $arrayBolao = [];

        for ($i = 1; $i <= $this->totalJogos; $i++) {
            $this->addJogos($i);
        }
    }

    public function sorteio()
    {
        $this->setQuantidadeDezenas(6);
        $this->resultado = $this->gerarJogo();
    }

    public function confereJogo()
    {
        $arrayResultadoPorJogo = [];
        foreach ($this->jogos as $key => $jogo) {
            $result = array_intersect($this->resultado, $jogo['Jogo']);

            array_push($arrayResultadoPorJogo, [
                'Id' =>  $key,
                'Jogo' =>  implode(',', $jogo['Jogo']),
                'Acertos' => count($result),
            ]);
        }

        echo  $this->imprimir($arrayResultadoPorJogo);
    }

    public function imprimir($resultoSorteio)
    {

        $html = "<h3>Numeros Sorteados: " .  implode(',', $this->resultado) . "</h3>";
        $html .= "<table>";
        $html .= "<thead>";
        $html .= "<tr>";
        $html .= "<th>Numero do Jogo</th>";
        $html .= "<th>Jogo</th>";
        $html .= "<th>Quantidade de acerto</th>";
        $html .= "</tr>";
        $html .= "</thead>";
        $html .= "<tbody>";
        foreach ($resultoSorteio as $key => $value) {
            $html .= "<tr>";

            $html .= "<td>" . $value['Id'] . "</td>";
            $html .= "<td>" . $value['Jogo'] . "</td>";
            $html .= "<td>" . $value['Acertos'] . "</td>";

            $html .= "</tr>";
        }

        $html .= "</tbody>";
        $html .= "</table>";

        return $html;
    }
}
