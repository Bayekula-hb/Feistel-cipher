<?php
/* This class are provide by kalkicode.com */
class Settlement {
	public static function getNumericValue($ch)
	{
		if (is_numeric($ch))
		{
			$ch = chr($ch);
		}
		if (ctype_upper($ch))
		{
			return ord($ch) - ord('A') + 10;
		}
		else if (ctype_lower($ch))
		{
			return ord($ch) - ord('a') + 10;
		}
		return -1;
	}
}

class CyberSecurity
{
    function __construct(){
    }
    public static function CyberSecurity_1()
    {
        $local_this = new CyberSecurity();
        return $local_this;
    }
    public static function inver(&$pi)
    {
        $Tempo = array_fill(0,count($pi),0);
        for ($i = 0; $i < count($pi); $i++)
        {
            $j = 0;
            $bl = false;
            do
            {
                if ($pi[$j] == $i)
                {
                    $bl = true;
                }
                else
                {
                    $j++;
                }
            }  while (!$bl);
            $Tempo[$i] = $j;
        }
        return $Tempo;
    }
    public static function permitation(&$mot, &$permut)
    {
        $index = 0;
        $tempo = array_fill(0,count($mot),0);
        for ($i = 0; $i < count($permut); $i++)
        {
            $index = $permut[$i];
            $tempo[$i] = $mot[$index];
        }
        $mot = $tempo;
        return $mot;
    }
    public static function DivisionTabeau(&$A)
    {
        $list = array();
        $taille = count($A);
        $longeurK1 = (int)(count($A) / 2);
        $longeurK2 = $taille - $longeurK1;
        $K1 = array_fill(0,$longeurK1,0);
        $K2 = array_fill(0,$longeurK2,0);
        for ($i = 0; $i < $longeurK1; $i++)
        {
            $K1[$i] = $A[$i];
        }
        for ($i = $longeurK1; $i < $taille; $i++)
        {
            $K2[$i - $longeurK1] = $A[$i];
        }
        array_push($list,$K1);
        array_push($list,$K2);
        return $list;
    }
    public static function Et(&$A, &$B)
    {
        $Tempo = array_fill(0,count($A),0);
        for ($i = 0; $i < count($A); $i++)
        {
            $Tempo[$i] = ($A[$i] == 1 && $B[$i] == 1) ? 1 : 0;
        }
        return $Tempo;
    }
    public static function Ou(&$A, &$B)
    {
        $Tempo = array_fill(0,count($A),0);
        for ($i = 0; $i < count($A); $i++)
        {
            $Tempo[$i] = ($A[$i] == 1 || $B[$i] == 1) ? 1 : 0;
        }
        return $Tempo;
    }
    public static function Ouexclusive(&$A, &$B)
    {
        $Tempo = array_fill(0,count($A),0);
        for ($i = 0; $i < count($A); $i++)
        {
            $Tempo[$i] = ($A[$i] == $B[$i]) ? 0 : 1;
        }
        return $Tempo;
    }
    public static function TrasnsformationMotInTab($mot)
    {
        $Tab = array_fill(0,strlen($mot),0);
        for ($i = 0; $i < count($Tab); $i++)
        {
            $a = $mot[$i];
            $Tab[$i] = Settlement::getNumericValue($a);
        }
        return $Tab;
    }
    public static function GenerationCle()
    {
        $Keys = array();
        $a;
        $H = array(
            6, 5, 2, 7, 4, 1, 3, 0
        );
        for ($i = 0; $i < count($H); $i++)
        {
            echo "L\'?l?ment ? la position" . strval($i) . " est:" . strval($H[$i]),"\n";
        }
        $valeurCle = "Inputs";
        $K = array(
            0, 1, 1, 0, 1, 1, 0, 1
        );
        $tempo;
        $K = cybersecurity.CyberSecurity::permitation($K, $H);
        $taille = count($K);
        $longeurK1 = (int)(count($K) / 2);
        $longeurK2 = $taille - $longeurK1;
        $K1 = array_fill(0,$longeurK1,0);
        $K2 = array_fill(0,$longeurK2,0);
        $K1 = cybersecurity.CyberSecurity::DivisionTabeau($K)[0];
        $K2 = cybersecurity.CyberSecurity::DivisionTabeau($K)[1];
        echo "Cl? avec H appliqu? : " . json_encode($K),"\n";
        echo "Premi?re cl? g?n?r?e : " . json_encode($K1),"\n";
        echo "Deuxi?me cl? g?n?r?e : " . json_encode($K2),"\n";
        $K11 = array_fill(0,count($K1),0);
        $K12 = array_fill(0,count($K1),0);
        $K11 = cybersecurity.CyberSecurity::Ouexclusive($K1, $K2);
        $K12 = cybersecurity.CyberSecurity::Et($K1, $K2);
        $tempo = array_fill(0,count($K11),0);
        for ($i = 2; $i < count($K12); $i++)
        {
            $tempo[$i - 2] = $K11[$i];
        }
        $tempo[count($K12) - 1] = $K11[1];
        $tempo[count($K11) - 2] = $K11[0];
        $K11 = $tempo;
        $tempo = array_fill(0,count($K11),0);
        echo "Premi?re cl? g?n?r?e K1 : " . json_encode($K11),"\n";
        $a = $K12[count($K12) - 1];
        $tempo[0] = $a;
        echo "Mot de gauche K1: " . json_encode($K11),"\n";
        for ($i = 0; $i < count($K12) - 1; $i++)
        {
            $tempo[$i + 1] = $K12[$i];
        }
        $K12 = $tempo;
        array_push($Keys,$K11);
        array_push($Keys,$K12);
        return $Keys;
    }
    public static function CryptageMot()
    {
        $sc = "Inputs";
        $mot = array(
            0, 1, 1, 0, 1, 1, 1, 0
        );
        $pi = array(
            4, 6, 0, 2, 7, 3, 1, 5
        );
        $tempo;
        $str;
        echo "Entre votre mot en binaire contenant 8 caractaire (Ex: 10111001) : ","\n";
        $str = readline();
        $mot = cybersecurity.CyberSecurity::TrasnsformationMotInTab($str);
        echo "Entre votre la permutation? allant de 0 ? 7  (Ex: 12345670) : ","\n";
        $str = readline();
        $pi = cybersecurity.CyberSecurity::TrasnsformationMotInTab($str);
        echo "pi : " . json_encode($pi),"\n";
        echo "mot : " . json_encode($mot),"\n";
        $mot = cybersecurity.CyberSecurity::permitation($mot, $pi);
        echo "Mot : " . json_encode($mot),"\n";
        $Go;
        $G1;
        $G2;
        $Do;
        $D1;
        $D2;
        $p = array(
            2, 0, 1, 3
        );
        $Go = cybersecurity.CyberSecurity::DivisionTabeau($mot)[0];
        $Do = cybersecurity.CyberSecurity::DivisionTabeau($mot)[1];
        echo "Mot de gauche Go: " . json_encode($Go),"\n";
        echo "Mot de droite D0: " . json_encode($Do),"\n";
        $K1 = cybersecurity.CyberSecurity::GenerationCle()[0];
        $K2 = cybersecurity.CyberSecurity::GenerationCle()[1];
        echo "K1: " . json_encode($K1),"\n";
        echo "K2: " . json_encode($K2),"\n";
        $D1 = cybersecurity.CyberSecurity::Ouexclusive(cybersecurity.CyberSecurity::permitation($Go, $p), $K1);
        $G1 = cybersecurity.CyberSecurity::Ouexclusive($Do, cybersecurity.CyberSecurity::Ou($Go, $K1));
        echo "Mot de gauche G1: " . json_encode($G1),"\n";
        echo "Mot de droite D1: " . json_encode($D1),"\n";
        $D2 = cybersecurity.CyberSecurity::Ouexclusive((cybersecurity.CyberSecurity::permitation($G1, $p)), $K2);
        $G2 = cybersecurity.CyberSecurity::Ouexclusive($D1, cybersecurity.CyberSecurity::Ou($G1, $K2));
        echo "Mot de gauche G2: " . json_encode($G2),"\n";
        echo "Mot de droite D2: " . json_encode($D2),"\n";
        $C = array_fill(0,count($D2) + count($G2),0);
        System.arraycopy($G2,0,$C,0,count($G2));
        System.arraycopy($D2,0,$C,count($G2),count($D2));
        echo "C = " . json_encode($C),"\n";
        $tempo = array_fill(0,count($pi),0);
        for ($i = 0; $i < count($pi); $i++)
        {
            $j = 0;
            $bl = false;
            do
            {
                if ($pi[$j] == $i)
                {
                    $bl = true;
                }
                else
                {
                    $j++;
                }
            }  while (!$bl);
            $tempo[$i] = $j;
        }
        $pi1 = $tempo;
        echo "pi1 = " . json_encode($pi1),"\n";
        $C = cybersecurity.CyberSecurity::permitation($C, $pi1);
        echo "Mot Crypter = " . json_encode($C),"\n";
    }
    public static function DecryptageMot()
    {
        $sc = "Inputs";
        $mot = array(
            0, 1, 1, 0, 1, 1, 1, 0
        );
        $pi = array(
            4, 6, 0, 2, 7, 3, 1, 5
        );
        $tempo;
        $str;
        echo "Entre votre mot ? decrypt? en binaire contenant 8 caractaire (Ex: 10111001) : ","\n";
        $str = readline();
        $mot = cybersecurity.CyberSecurity::TrasnsformationMotInTab($str);
        echo "Entre votre la permutation? allant de 0 ? 7  (Ex: 12345670) : ","\n";
        $str = readline();
        $pi = cybersecurity.CyberSecurity::TrasnsformationMotInTab($str);
        $mot = cybersecurity.CyberSecurity::permitation($mot, $pi);
        echo "Mot : " . json_encode($mot),"\n";
        $Go;
        $G1;
        $G2;
        $Do;
        $D1;
        $D2;
        $p = array(
            2, 0, 1, 3
        );
        $Go = cybersecurity.CyberSecurity::DivisionTabeau($mot)[0];
        $Do = cybersecurity.CyberSecurity::DivisionTabeau($mot)[1];
        $K1 = cybersecurity.CyberSecurity::GenerationCle()[0];
        $K2 = cybersecurity.CyberSecurity::GenerationCle()[1];
        $tempo = array_fill(0,count($p),0);
        for ($i = 0; $i < count($p); $i++)
        {
            $j = 0;
            $bl = false;
            do
            {
                if ($p[$j] == $i)
                {
                    $bl = true;
                }
                else
                {
                    $j++;
                }
            }  while (!$bl);
            $tempo[$i] = $j;
        }
        $p1 = $tempo;
        $G1 = cybersecurity.CyberSecurity::permitation(cybersecurity.CyberSecurity::Ouexclusive($Do, $K2), $p1);
        $D1 = cybersecurity.CyberSecurity::Ouexclusive($Go, cybersecurity.CyberSecurity::Ou($G1, $K2));
        echo "Mot de gauche G1: " . json_encode($G1),"\n";
        echo "Mot de droite D1: " . json_encode($D1),"\n";
        $G2 = cybersecurity.CyberSecurity::permitation(cybersecurity.CyberSecurity::Ouexclusive($D1, $K1), $p1);
        $D2 = cybersecurity.CyberSecurity::Ouexclusive($G1, cybersecurity.CyberSecurity::Ou($G2, $K1));
        echo "Mot de gauche G2: " . json_encode($G2),"\n";
        echo "Mot de droite D2: " . json_encode($D2),"\n";
        $C = array_fill(0,count($D2) + count($G2),0);
        System.arraycopy($G2,0,$C,0,count($G2));
        System.arraycopy($D2,0,$C,count($G2),count($D2));
        echo "C = " . json_encode($C),"\n";
        $tempo = array_fill(0,count($pi),0);
        for ($i = 0; $i < count($pi); $i++)
        {
            $j = 0;
            $bl = false;
            do
            {
                if ($pi[$j] == $i)
                {
                    $bl = true;
                }
                else
                {
                    $j++;
                }
            }  while (!$bl);
            $tempo[$i] = $j;
        }
        $pi1 = $tempo;
        echo "pi1 = " . json_encode($pi1),"\n";
        $C = cybersecurity.CyberSecurity::permitation($C, $pi1);
        echo "Mot Decrypter = " . json_encode($C),"\n";
    }
    public static function main_1(&$args)
    {
        $x = "Inputs";
        $choix = 0;
        echo " FEISTEL-cipher ","\n";
        echo "================ ","\n";
        $fin = 1;
        do
        {
            echo " Menu ","\n";
            echo "-------","\n";
            echo " 1. cryptage du mot binaire ? 8 bit","\n";
            echo " 2. Dechiffrage du mot binaire ? 8 bit ","\n";
            echo "\n","\n";
            do
            {
                echo "\t Votre choix entre 1 et 2","\n";
                $choix = (int)readline();
            }  while ($choix <= 0);
            if ($choix == 1)
            {
                cybersecurity.CyberSecurity::CryptageMot();
            }
            else
            {
                cybersecurity.CyberSecurity::DecryptageMot();
            }
            echo " voulez-vous continuer? (si oui reponder par 1, sinon 2) ","\n";
            do
            {
                echo "(si oui reponder par 1, sinon 2)","\n";
                $fin = (int)readline();
            }  while ($fin <= 0);
        }  while ($fin == 1);
    }
}
CyberSecurity::main_1($argv);