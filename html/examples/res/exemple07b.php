<?php
//源码由 旺旺:dongshaolin2008所有  禁止倒卖 一经发现停止任何服务！
echo "<page orientation=\"paysage\" >\n    <bookmark title=\"Document\" level=\"0\" ></bookmark>\n    <a name=\"document_reprise\"></a>\n    <table cellspacing=\"0\" style=\"width: 100%;\">\n        <tr>\n            <td style=\"width: 10%;\">\n                <img style=\"width: 100%\" src=\"./res/logo.gif\" alt=\"Logo HTML2PDF\" >\n            </td>\n            <td style=\"width: 80%; text-align: center; text-decoration: underline; font-weight: bold; font-size: 20pt;\">\n                <span style=\"font-size: 10pt\"><br></span>\n                ACCORD DE RETOUR\n            </td>\n            <td style=\"width: 10%;\">\n            </td>\n        </tr>\n    </table>\n    <table cellspacing=\"0\" style=\"width: 100%;\">\n        <tr>\n            <td style=\"width: 55% \">\n                <table cellspacing=\"0\" style=\"width: 100%; border: solid 2px #000000; \">\n                    <tr>\n                        <td style=\"width: 100%; font-size: 12pt;\">\n                            <span style=\"font-size: 15pt; font-weight: bold;\">ADRESSE DE RETOUR<br></span>\n                            <br>\n                            <b>Entrepot des Bois</b><br>\n                            sur une grande route<br>\n                            00000 - Spipu Ville<br>\n                            <br>\n                            Date : ";
echo date('d/m/Y');
echo "<br>\n                            Dossier suivi par <b>Mle Jesuis CELIBATAIRE</b><br>\n                            Tel : 33 (0) 1 00 00 00 00<br>\n                            Email : on_va@chez.moi<br>\n                        </td>\n                    </tr>\n                </table>\n                <br>&nbsp;\n            </td>\n            <td style=\"width: 4%\"></td>\n            <td style=\"width: 37% \">\n                <table cellspacing=\"0\" style=\"width: 100%; border: solid 2px #000000; font-size: 12pt;\">\n                    <tr><td style=\"width: 40%;\">Référence :        </td><td style=\"width: 60%;\">71326</td></tr>\n                    <tr><td style=\"width: 40%;\">Client :        </td><td style=\"width: 60%;\">M. Albert Dupont</td></tr>\n                    <tr><td style=\"width: 40%;\">Adresse :        </td><td style=\"width: 60%;\">Résidence perdue<br>1, rue sans nom<br>00 000 - Pas de Ville</td></tr>\n                    <tr><td style=\"width: 40%;\">TEL :             </td><td style=\"width: 60%;\">33 (0) 1 00 00 00 00</td></tr>\n                    <tr><td style=\"width: 40%;\">FAX :            </td><td style=\"width: 60%;\">33 (0) 1 00 00 00 01</td></tr>\n                    <tr><td style=\"width: 40%;\">Code Client    :    </td><td style=\"width: 60%;\">00C4520100A</td></tr>\n                </table>\n                <table cellspacing=\"0\" style=\"width: 100%; border: solid 2px #000000\">\n                    <tr>\n                        <th style=\"width: 40%;\">Motif de la Reprise</th>\n                        <td style=\"width: 60%;\">Produit non Conforme</td>\n                    </tr>\n                </table>\n                <br>\n            </td>\n            <td style=\"width: 4%\"></td>\n        </tr>\n        <tr>\n            <td style=\"width:55%;\">\n                <table cellspacing=\"0\" style=\"padding: 1px; width: 100%; border: solid 2px #000000; font-size: 11pt; \">\n                    <tr>\n                        <th style=\"width: 100%; text-align: center; border: solid 1px #000000;\" colspan=\"4\">\n                            Partie réservée à Spipu Corp\n                        </th>\n                    </tr>\n                    <tr>\n                        <th style=\"width: 100%; text-align: center; border: solid 1px #000000;\" colspan=\"4\">\n                            QUANTITE PREVUE AU CHARGEMENT\n                        </th>\n                    </tr>\n                    <tr>\n                        <th style=\"width: 15%; border: solid 1px #000000;\">Produit</th>\n                        <th style=\"width: 55%; border: solid 1px #000000;\">Designation</th>\n                        <th style=\"width: 15%; border: solid 1px #000000;\">Neuf</th>\n                        <th style=\"width: 15%; border: solid 1px #000000;\">Abîmé</th>\n                    </tr>\n";
$i = 0;

foreach ($produits as $produit) {
	$i++;
	echo "                    <tr>\n                        <td style=\"width: 15%; border: solid 1px #000000;\">";
	echo $produit[0];
	echo "</td>\n                        <td style=\"width: 55%; border: solid 1px #000000;text-align: left;\">";
	echo $produit[1];
	echo "</td>\n                        <td style=\"width: 15%; border: solid 1px #000000;\">";
	echo $produit[4];
	echo "</td>\n                        <td style=\"width: 15%; border: solid 1px #000000;\">";
	echo $produit[2] - $produit[4];
	echo "</td>\n                    </tr>\n\n";
}

for (; $i < 12; $i++) {
	echo "                    <tr>\n                        <td style=\"width: 15%; border: solid 1px #000000;\">&nbsp;</td>\n                        <td style=\"width: 55%; border: solid 1px #000000;\">&nbsp;</td>\n                        <td style=\"width: 15%; border: solid 1px #000000;\">&nbsp;</td>\n                        <td style=\"width: 15%; border: solid 1px #000000;\">&nbsp;</td>\n                    </tr>\n";
}

echo "                </table>\n                <br>\n                <table cellspacing=\"0\" style=\"width: 100%; text-align: left; font-size: 8pt\">\n                    <tr>\n                        <td style=\"width: 100%\">\n                            <b><u>Conditions des Retours</u></b><br>\n                            1 - il faut des conditions<br>\n                            2 - encore des conditions<br>\n                            3 - toujours des conditions<br>\n                        </td>\n                    </tr>\n                </table>\n                <br>\n                <table cellspacing=\"0\" style=\"width: 100%; border: solid 2px #000000; text-align: center; font-size: 10pt\">\n                    <tr>\n                        <td style=\"width: 30%\"></td>\n                        <td style=\"width: 40%\">ACCORD SOCIETE</td>\n                        <td style=\"width: 30%\"></td>\n                    </tr>\n                    <tr>\n                        <td style=\"width: 30%\"><br><br>M. XX</td>\n                        <td style=\"width: 40%\"></td>\n                        <td style=\"width: 30%\"><br><br>Mme XY</td>\n                    </tr>\n                </table>\n            </td>\n            <td style=\"width: 4%\"></td>\n            <td style=\"width: 37%;\">\n                <table cellspacing=\"0\" style=\"padding: 1px; width: 100%; border: solid 2px #000000; font-size: 11pt; \">\n                    <tr>\n                        <th style=\"width: 100%; text-align: center; border: solid 1px #000000;\" colspan=\"2\">\n                            Partie réservée à l'entrepôt\n                        </th>\n                    </tr>\n                    <tr>\n                        <th style=\"width: 100%; text-align: center; border: solid 1px #000000;\" colspan=\"2\">\n                            QUANTITE PREVUE AU CHARGEMENT\n                        </th>\n                    </tr>\n                    <tr>\n                        <th style=\"width: 50%; border: solid 1px #000000;\">Produit neuf                </th>\n                        <th style=\"width: 50%; border: solid 1px #000000;\">Produit à reconditionner    </th>\n                    </tr>\n";

for ($i = 0; $i < 12; $i++) {
	echo "                    <tr>\n                        <td style=\"width: 50%; border: solid 1px #000000;\">&nbsp;</td>\n                        <td style=\"width: 50%; border: solid 1px #000000;\">&nbsp;</td>\n                    </tr>\n";
}

echo "                </table>\n                <br>\n                <table cellspacing=\"0\" style=\"width: 100%; border: solid 2px #000000; text-align: left; font-size: 10pt\">\n                    <tr>\n                        <th style=\"width: 30%;\">\n                            Commentaire<br>\n                            Retour :<br>\n                            &nbsp;<br>\n                            &nbsp;<br>\n                        </th>\n                        <td style=\"width: 70%;\">\n                        </td>\n                    </tr>\n                </table>\n                <br>\n                <br>\n                <span style=\"font-size: 13pt\"><b><u>A COLLER IMPERATIVEMENT SUR LES COLIS</u></b></span>\n            </td>\n            <td style=\"width: 4%\"></td>\n        </tr>\n    </table>\n</page>";

?>
