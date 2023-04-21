class CyberSecurity
{
    static inver(pi)
    {
        var Tempo = Array(this.pi.length).fill(0);
        for (i; i < this.pi.length; i++)
        {
            var j = 0;
            var bl = false;
            do
            {
                if (this.pi[j] == i)
                {
                    bl = true;
                }
                else
                {
                    j++;
                }
            }             while (!bl);
            Tempo[i] = j;
        }
        return Tempo;
    }
    static permitation(mot, permut)
    {
        var index = 0;
        var tempo = Array(this.mot.length).fill(0);
        for (i; i < this.permut.length; i++)
        {
            index = this.permut[i];
            tempo[i] = this.mot[index];
        }
        this.mot = tempo;
        return this.mot;
    }
    static DivisionTabeau(A)
    {
        var list = new Array();
        var taille = this.A.length;
        var longeurK1 = parseInt(this.A.length / 2);
        var longeurK2 = taille - longeurK1;
        var K1 = Array(longeurK1).fill(0);
        var K2 = Array(longeurK2).fill(0);
        for (i; i < longeurK1; i++)
        {
            K1[i] = this.A[i];
        }
        for (i; i < taille; i++)
        {
            K2[i - longeurK1] = this.A[i];
        }
        (list.push(K1) > 0);
        (list.push(K2) > 0);
        return list;
    }
    static Et(A, B)
    {
        var Tempo = Array(this.A.length).fill(0);
        for (i; i < this.A.length; i++)
        {
            Tempo[i] = (this.A[i] == 1 && this.B[i] == 1) ? 1 : 0;
        }
        return Tempo;
    }
    static Ou(A, B)
    {
        var Tempo = Array(this.A.length).fill(0);
        for (i; i < this.A.length; i++)
        {
            Tempo[i] = (this.A[i] == 1 || this.B[i] == 1) ? 1 : 0;
        }
        return Tempo;
    }
    static Ouexclusive(A, B)
    {
        var Tempo = Array(this.A.length).fill(0);
        for (i; i < this.A.length; i++)
        {
            Tempo[i] = (this.A[i] == this.B[i]) ? 0 : 1;
        }
        return Tempo;
    }
    static TrasnsformationMotInTab(mot)
    {
        var Tab = Array(this.mot.length).fill(0);
        for (i; i < Tab.length; i++)
        {
            var a = this.mot.charAt(i);
            Tab[i] = Character.getNumericValue(a);
        }
        return Tab;
    }
    static GenerationCle()
    {
        var Keys = new Array();
        var a = 0;
        var H = [6, 5, 2, 7, 4, 1, 3, 0];
        for (i; i < H.length; i++)
        {
            console.log("L\'?l?ment ? la position" + i + " est:" + H[i]);
        }
        var valeurCle = java.util.Scanner(java.io.BufferedInputStream@78e4deb0);
        var K = [0, 1, 1, 0, 1, 1, 0, 1];
        var tempo = [];
        K = cybersecurity.CyberSecurity.permitation(K, H);
        var taille = K.length;
        var longeurK1 = parseInt(K.length / 2);
        var longeurK2 = taille - longeurK1;
        var K1 = Array(longeurK1).fill(0);
        var K2 = Array(longeurK2).fill(0);
        K1 = cybersecurity.CyberSecurity.DivisionTabeau(K)[0];
        K2 = cybersecurity.CyberSecurity.DivisionTabeau(K)[1];
        console.log("Cl? avec H appliqu? : " + Arrays.toString(K));
        console.log("Premi?re cl? g?n?r?e : " + Arrays.toString(K1));
        console.log("Deuxi?me cl? g?n?r?e : " + Arrays.toString(K2));
        var K11 = Array(K1.length).fill(0);
        var K12 = Array(K1.length).fill(0);
        K11 = cybersecurity.CyberSecurity.Ouexclusive(K1, K2);
        K12 = cybersecurity.CyberSecurity.Et(K1, K2);
        tempo = Array(K11.length).fill(0);
        for (i; i < K12.length; i++)
        {
            tempo[i - 2] = K11[i];
        }
        tempo[K12.length - 1] = K11[1];
        tempo[K11.length - 2] = K11[0];
        K11 = tempo;
        tempo = Array(K11.length).fill(0);
        console.log("Premi?re cl? g?n?r?e K1 : " + Arrays.toString(K11));
        a = K12[K12.length - 1];
        tempo[0] = a;
        console.log("Mot de gauche K1: " + Arrays.toString(K11));
        for (i; i < K12.length - 1; i++)
        {
            tempo[i + 1] = K12[i];
        }
        K12 = tempo;
        (Keys.push(K11) > 0);
        (Keys.push(K12) > 0);
        return Keys;
    }
    static CryptageMot()
    {
        var sc = java.util.Scanner(java.io.BufferedInputStream@78e4deb0);
        var mot = [0, 1, 1, 0, 1, 1, 1, 0];
        var pi = [4, 6, 0, 2, 7, 3, 1, 5];
        var tempo = [];
        var str = null;
        console.log("Entre votre mot en binaire contenant 8 caractaire (Ex: 10111001) : ");
        str = sc.nextLine();
        mot = cybersecurity.CyberSecurity.TrasnsformationMotInTab(str);
        console.log("Entre votre la permutation? allant de 0 ? 7  (Ex: 12345670) : ");
        str = sc.nextLine();
        pi = cybersecurity.CyberSecurity.TrasnsformationMotInTab(str);
        console.log("pi : " + Arrays.toString(pi));
        console.log("mot : " + Arrays.toString(mot));
        mot = cybersecurity.CyberSecurity.permitation(mot, pi);
        console.log("Mot : " + Arrays.toString(mot));
        var Go = [];
        var G1 = [];
        var G2 = [];
        var Do = [];
        var D1 = [];
        var D2 = [];
        var p = [2, 0, 1, 3];
        Go = cybersecurity.CyberSecurity.DivisionTabeau(mot)[0];
        Do = cybersecurity.CyberSecurity.DivisionTabeau(mot)[1];
        console.log("Mot de gauche Go: " + Arrays.toString(Go));
        console.log("Mot de droite D0: " + Arrays.toString(Do));
        var K1 = cybersecurity.CyberSecurity.GenerationCle()[0];
        var K2 = cybersecurity.CyberSecurity.GenerationCle()[1];
        console.log("K1: " + Arrays.toString(K1));
        console.log("K2: " + Arrays.toString(K2));
        D1 = cybersecurity.CyberSecurity.Ouexclusive(cybersecurity.CyberSecurity.permitation(Go, p), K1);
        G1 = cybersecurity.CyberSecurity.Ouexclusive(Do, cybersecurity.CyberSecurity.Ou(Go, K1));
        console.log("Mot de gauche G1: " + Arrays.toString(G1));
        console.log("Mot de droite D1: " + Arrays.toString(D1));
        D2 = cybersecurity.CyberSecurity.Ouexclusive((cybersecurity.CyberSecurity.permitation(G1, p)), K2);
        G2 = cybersecurity.CyberSecurity.Ouexclusive(D1, cybersecurity.CyberSecurity.Ou(G1, K2));
        console.log("Mot de gauche G2: " + Arrays.toString(G2));
        console.log("Mot de droite D2: " + Arrays.toString(D2));
        var C = Array(D2.length + G2.length).fill(0);
        System.arraycopy(G2,0,C,0,G2.length);
        System.arraycopy(D2,0,C,G2.length,D2.length);
        console.log("C = " + Arrays.toString(C));
        tempo = Array(pi.length).fill(0);
        for (i; i < pi.length; i++)
        {
            var j = 0;
            var bl = false;
            do
            {
                if (pi[j] == i)
                {
                    bl = true;
                }
                else
                {
                    j++;
                }
            }             while (!bl);
            tempo[i] = j;
        }
        var pi1 = tempo;
        console.log("pi1 = " + Arrays.toString(pi1));
        C = cybersecurity.CyberSecurity.permitation(C, pi1);
        console.log("Mot Crypter = " + Arrays.toString(C));
    }
    static DecryptageMot()
    {
        var sc = java.util.Scanner(java.io.BufferedInputStream@78e4deb0);
        var mot = [0, 1, 1, 0, 1, 1, 1, 0];
        var pi = [4, 6, 0, 2, 7, 3, 1, 5];
        var tempo = [];
        var str = null;
        console.log("Entre votre mot ? decrypt? en binaire contenant 8 caractaire (Ex: 10111001) : ");
        str = sc.nextLine();
        mot = cybersecurity.CyberSecurity.TrasnsformationMotInTab(str);
        console.log("Entre votre la permutation? allant de 0 ? 7  (Ex: 12345670) : ");
        str = sc.nextLine();
        pi = cybersecurity.CyberSecurity.TrasnsformationMotInTab(str);
        mot = cybersecurity.CyberSecurity.permitation(mot, pi);
        console.log("Mot : " + Arrays.toString(mot));
        var Go = [];
        var G1 = [];
        var G2 = [];
        var Do = [];
        var D1 = [];
        var D2 = [];
        var p = [2, 0, 1, 3];
        Go = cybersecurity.CyberSecurity.DivisionTabeau(mot)[0];
        Do = cybersecurity.CyberSecurity.DivisionTabeau(mot)[1];
        var K1 = cybersecurity.CyberSecurity.GenerationCle()[0];
        var K2 = cybersecurity.CyberSecurity.GenerationCle()[1];
        tempo = Array(p.length).fill(0);
        for (i; i < p.length; i++)
        {
            var j = 0;
            var bl = false;
            do
            {
                if (p[j] == i)
                {
                    bl = true;
                }
                else
                {
                    j++;
                }
            }             while (!bl);
            tempo[i] = j;
        }
        var p1 = tempo;
        G1 = cybersecurity.CyberSecurity.permitation(cybersecurity.CyberSecurity.Ouexclusive(Do, K2), p1);
        D1 = cybersecurity.CyberSecurity.Ouexclusive(Go, cybersecurity.CyberSecurity.Ou(G1, K2));
        console.log("Mot de gauche G1: " + Arrays.toString(G1));
        console.log("Mot de droite D1: " + Arrays.toString(D1));
        G2 = cybersecurity.CyberSecurity.permitation(cybersecurity.CyberSecurity.Ouexclusive(D1, K1), p1);
        D2 = cybersecurity.CyberSecurity.Ouexclusive(G1, cybersecurity.CyberSecurity.Ou(G2, K1));
        console.log("Mot de gauche G2: " + Arrays.toString(G2));
        console.log("Mot de droite D2: " + Arrays.toString(D2));
        var C = Array(D2.length + G2.length).fill(0);
        System.arraycopy(G2,0,C,0,G2.length);
        System.arraycopy(D2,0,C,G2.length,D2.length);
        console.log("C = " + Arrays.toString(C));
        tempo = Array(pi.length).fill(0);
        for (i; i < pi.length; i++)
        {
            var j = 0;
            var bl = false;
            do
            {
                if (pi[j] == i)
                {
                    bl = true;
                }
                else
                {
                    j++;
                }
            }             while (!bl);
            tempo[i] = j;
        }
        var pi1 = tempo;
        console.log("pi1 = " + Arrays.toString(pi1));
        C = cybersecurity.CyberSecurity.permitation(C, pi1);
        console.log("Mot Decrypter = " + Arrays.toString(C));
    }
    static main(args)
    {
        var x = java.util.Scanner(java.io.BufferedInputStream@78e4deb0);
        var choix = 0;
        console.log(" FEISTEL-cipher ");
        console.log("================ ");
        var fin = 1;
        do
        {
            console.log(" Menu ");
            console.log("-------");
            console.log(" 1. cryptage du mot binaire ? 8 bit");
            console.log(" 2. Dechiffrage du mot binaire ? 8 bit ");
            console.log("\n");
            do
            {
                console.log("\t Votre choix entre 1 et 2");
                choix = x.nextInt();
            }             while (choix <= 0);
            if (choix == 1)
            {
                cybersecurity.CyberSecurity.CryptageMot();
            }
            else
            {
                cybersecurity.CyberSecurity.DecryptageMot();
            }
            console.log(" voulez-vous continuer? (si oui reponder par 1, sinon 2) ");
            do
            {
                console.log("(si oui reponder par 1, sinon 2)");
                fin = x.nextInt();
            }             while (fin <= 0);
        }         while (fin == 1);
    }
}
CyberSecurity.main([]);