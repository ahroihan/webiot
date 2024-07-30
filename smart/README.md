### WEBIOTID: Metode SMART (Simple Multi-Attribute Rating Technique)

---

**SMART** adalah metode pengambilan keputusan (SPK) multi-kriteria yang sederhana dan efektif. SMART membantu mengidentifikasi dan mengevaluasi alternatif berdasarkan berbagai kriteria dengan memberikan bobot dan nilai untuk setiap kriteria.

---

**Langkah-Langkah SMART**

1. **Identifikasi Alternatif dan Kriteria**
- Tentukan alternatif (A1, A2, ..., An) yang akan dievaluasi.
- Tentukan kriteria (C1, C2, ..., Cm) yang akan digunakan untuk mengevaluasi alternatif.

2. **Menentukan Bobot Kriteria**
- Berikan bobot \($ w_j $\) untuk setiap kriteria \($ C_j $\) yang mencerminkan pentingnya kriteria tersebut. Bobot biasanya dinormalisasi sehingga jumlah totalnya adalah 1:

$$
\sum_{j=1}^{m} w_j = 1
$$

3. **Menilai Setiap Alternatif pada Setiap Kriteria**
- Berikan nilai \($ x_{ij} $\) untuk setiap alternatif \($ A_i $\) pada kriteria \($ C_j $\). Nilai ini mencerminkan seberapa baik alternatif memenuhi kriteria.

4. **Normalisasi Nilai Alternatif**
- Untuk kriteria benefit (keuntungan), nilai dinormalisasi menggunakan rumus:

$$
r_{ij} = \frac{x_{ij}}{\max(x_{ij})}
$$

- Untuk kriteria cost (biaya), nilai dinormalisasi menggunakan rumus:

$$
r_{ij} = \frac{\min(x_{ij})}{x_{ij}}
$$

5. **Menghitung Nilai Ternormalisasi Terbobot**
- Nilai ternormalisasi terbobot dihitung dengan mengalikan nilai normalisasi dengan bobot kriteria:

$$
v_{ij} = w_j \cdot r_{ij}
$$

6. **Menghitung Skor Total untuk Setiap Alternatif**
- Skor total untuk setiap alternatif dihitung dengan menjumlahkan semua nilai ternormalisasi terbobot:

$$
S_i = \sum_{j=1}^{m} v_{ij}
$$

7. **Peringkat Alternatif**
- Alternatif dengan skor total tertinggi adalah yang terbaik.

---

**Contoh Kasus**

Misalkan kita memiliki tiga alternatif (A1, A2, A3) dan tiga kriteria (C1, C2, C3). Bobot kriteria adalah w = [0.5, 0.3, 0.2]. Matriks keputusan awal adalah sebagai berikut:

$$
\begin{array}{ccc}
    & C1 & C2 & C3 \\
A1 & 70 & 90 & 80 \\
A2 & 80 & 70 & 60 \\
A3 & 90 & 80 & 90 \\
\end{array}
$$

1. **Normalisasi Nilai Alternatif**
- Untuk kriteria benefit:

$$
r_{ij} = \frac{x_{ij}}{\max(x_{ij})}
$$

- Matriks normalisasi:

$$
\begin{array}{ccc}
0.778 & 1.000 & 0.889 \\
0.889 & 0.778 & 0.667 \\
1.000 & 0.889 & 1.000 \\
\end{array}
$$

2. **Menghitung Nilai Ternormalisasi Terbobot**
- Matriks nilai ternormalisasi terbobot:

$$
\begin{array}{ccc}
0.389 & 0.300 & 0.178 \\
0.444 & 0.233 & 0.133 \\
0.500 & 0.267 & 0.200 \\
\end{array}
$$

3. **Menghitung Skor Total untuk Setiap Alternatif**
- Skor total:

$$
S_1 = 0.867 \quad S_2 = 0.810 \quad S_3 = 0.967
$$

---


Dari perhitungan di atas, alternatif A3 adalah yang terbaik karena memiliki skor total tertinggi (0.967).
#SMART #DecisionMaking #MultiCriteriaAnalysis #Benefit #Cost #Optimization
