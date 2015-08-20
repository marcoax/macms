<?php
class gallery extends media {

		function gallery() {
			$this -> media();
		}

			function makeGallery($IdCategory = '', $IdSubCategory = '', $lang = '') {
			$this -> _ma_pre_getData();
			$this -> sel .= ",pc.Label as Tipo";
			$this -> tab = TABLE_MEDIA . " as me left join " . TABLE_CATEGORYTREE . ' as pc on me.IdCategory=pc.IdCategory';
			//$this -> tab = TABLE_MEDIA . " as me ";
			if ($lang) {
				$this->tab.= " left join ".TABLE_CATEGORYTREE_DESCRIZIONI. ' as cl on cl.IdOpzioni=me.IdDocumento ';
				$this -> wObj -> addWhere(" (me.Lang='" . $lang . "' or me.Lang='')");
				$this->wObj->setEq("cl.IdPage",'documenti');
				$this->wObj->setEq("cl.IdTipo",'Title');
				$this->wObj->setEq("cl.Lingua",$lang);
				 $this->sel.=",cl.Label as TitleLang";  // titolo in linga
			}

			$this -> wObj -> setEq("me.IdCategory", $IdCategory);

			if (String::ma_not_null($IdSubCategory)) {
				if (is_array($IdSubCategory))
					$this -> wObj -> addWhere("IdAzione In (" . implode(',', $IdSubCategory) . ")");
				else
					$this -> wObj -> setEq("IdAzione", $IdSubCategory);
			}
			$this -> wObj -> setEq("me.Disable", 0);
			$this -> Order = 'me.Sort,me.Title';

		}

		function getMainImage() {
			$this -> _ma_pre_getData();
			$this -> sel .= ",l.Title as Categoria";
			$this -> tab = TABLE_MEDIA . " as me left join " . TABLE_LAVORI . " as l on  me.IdCategory=l.Id";
			$this -> wObj -> setEq("me.FlagOb", 0);
			$this -> wObj -> setEq("me.FlagHome", 1);
			$this -> getData(2);

		}

		function getHomeImages() {
			$this -> _ma_pre_getData();
			$this -> sel .= ",l.Title as Categoria";
			$this -> tab = TABLE_MEDIA . " as me left join " . TABLE_LAVORI . " as l on  me.IdCategory=l.Id";
			$this -> wObj -> setEq("me.FlagOb", 0);
			$this -> wObj -> setEq("me.FlagThumb", 1);
			$this -> setLimit(0, 4);
			$this -> getData();

		}

		function getImageList() {
			if ($this -> Data) {
				$a = 1;
				foreach ($this->Data as $d) {
					$html .= "<a href=\"" . FILE_PROGETTI . "?progetto=" . $d -> IdCategory . "\" onmouseover=\"showGallery(" . $a . ")\" onmouseout=\"showGallery(0)\">";
					$html .= "<img src=\"" . DIR_WS_REPOSITORY . $d -> ImgThumb . "\" width=\"30\"  height=\"30\" alt=\"" . $d -> Categoria . "\" class=\"gallery\" />";
					$html .= "</a>\n";
					$a++;
				}
			}
			return $html;
		}

		// ritorno la  categoria della  gallaery;
		function getGalleryTitle($Id, $lang = '', $IdPage = 'categorytree') {
			$objTitle = new categorytree;
			if ($lang) {
				$objTitle -> setLang($lang);

			}
			$objTitle -> prepareTree();
			$objTitle -> wObj -> setEq("ct.IdCategory", $Id);
			if ($lang)
				$objTitle -> wObj -> setEq("cl.IdPage", $IdPage);
			$objTitle -> sel .= ",cl.IdTipo as IdTipo";
			$objTitle -> getData();
			if ($objTitle -> Data) {
				foreach ($objTitle->Data as $d) {
					if ($d -> IdTipo == 'Intro')
						$this -> galleryTitle = stripslashes($d -> b);
					if ($d -> IdTipo == 'Descrizione')
						$this -> galleryDescription = stripslashes($d -> b);
				}

			}

		}

	}