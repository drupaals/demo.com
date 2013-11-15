<?php

/* core/modules/system/templates/maintenance-page.html.twig */
class __TwigTemplate_45a277a9afc6be8007ce5cbb38df94c7 extends Drupal\Core\Template\TwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 15
        echo "<!DOCTYPE html>
<html";
        // line 16
        echo twig_render_var($this->getContextReference($context, "html_attributes"));
        echo ">
<head>
  ";
        // line 18
        echo twig_render_var($this->getContextReference($context, "head"));
        echo "
  <title>";
        // line 19
        echo twig_render_var($this->getContextReference($context, "head_title"));
        echo "</title>
  ";
        // line 20
        echo twig_render_var($this->getContextReference($context, "styles"));
        echo "
  ";
        // line 21
        echo twig_render_var($this->getContextReference($context, "scripts"));
        echo "
</head>
<body class=\"";
        // line 23
        echo twig_render_var($this->getAttribute($this->getContextReference($context, "attributes"), "class"));
        echo "\">

<div class=\"l-container\">

  <header role=\"banner\">
    ";
        // line 28
        if ((isset($context["logo"]) ? $context["logo"] : null)) {
            // line 29
            echo "      <a href=\"";
            echo twig_render_var($this->getContextReference($context, "front_page"));
            echo "\" title=\"";
            echo twig_render_var(t("Home"));
            echo "\" rel=\"home\">
        <img src=\"";
            // line 30
            echo twig_render_var($this->getContextReference($context, "logo"));
            echo "\" alt=\"";
            echo twig_render_var(t("Home"));
            echo "\"/>
      </a>
    ";
        }
        // line 33
        echo "
    ";
        // line 34
        if (((isset($context["site_name"]) ? $context["site_name"] : null) || (isset($context["site_slogan"]) ? $context["site_slogan"] : null))) {
            // line 35
            echo "      <div class=\"name-and-slogan\">
        ";
            // line 36
            if ((isset($context["site_name"]) ? $context["site_name"] : null)) {
                // line 37
                echo "         <h1 class=\"site-name\">
           <a href=\"";
                // line 38
                echo twig_render_var($this->getContextReference($context, "front_page"));
                echo "\" title=\"";
                echo twig_render_var(t("Home"));
                echo "\" rel=\"home\">";
                echo twig_render_var($this->getContextReference($context, "site_name"));
                echo "</a>
         </h1>
        ";
            }
            // line 41
            echo "
        ";
            // line 42
            if ((isset($context["site_slogan"]) ? $context["site_slogan"] : null)) {
                // line 43
                echo "          <div class=\"site-slogan\">";
                echo twig_render_var($this->getContextReference($context, "site_slogan"));
                echo "</div>
        ";
            }
            // line 45
            echo "      </div>";
            // line 46
            echo "    ";
        }
        // line 47
        echo "
  </header>

  <main role=\"main\">
    ";
        // line 51
        if ((isset($context["title"]) ? $context["title"] : null)) {
            // line 52
            echo "      <h1>";
            echo twig_render_var($this->getContextReference($context, "title"));
            echo "</h1>
    ";
        }
        // line 54
        echo "
    ";
        // line 55
        echo twig_render_var($this->getContextReference($context, "messages"));
        echo "

    ";
        // line 57
        echo twig_render_var($this->getContextReference($context, "content"));
        echo "
  </main>

  ";
        // line 60
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_first")) {
            // line 61
            echo "    <aside class=\"l-sidebar-first\" role=\"complementary\">
      ";
            // line 62
            echo twig_render_var($this->getAttribute($this->getContextReference($context, "page"), "sidebar_first"));
            echo "
    </aside>";
            // line 64
            echo "  ";
        }
        // line 65
        echo "
  ";
        // line 66
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_second")) {
            // line 67
            echo "    <aside class=\"l-sidebar-second\" role=\"complementary\">
      ";
            // line 68
            echo twig_render_var($this->getAttribute($this->getContextReference($context, "page"), "sidebar_second"));
            echo "
    </aside>";
            // line 70
            echo "  ";
        }
        // line 71
        echo "
  ";
        // line 72
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer")) {
            // line 73
            echo "    <footer role=\"contentinfo\">
      ";
            // line 74
            echo twig_render_var($this->getAttribute($this->getContextReference($context, "page"), "footer"));
            echo "
    </footer>
  ";
        }
        // line 77
        echo "
</div>";
        // line 79
        echo "
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "core/modules/system/templates/maintenance-page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  180 => 79,  177 => 77,  171 => 74,  168 => 73,  166 => 72,  163 => 71,  160 => 70,  156 => 68,  153 => 67,  151 => 66,  148 => 65,  145 => 64,  141 => 62,  138 => 61,  136 => 60,  130 => 57,  125 => 55,  122 => 54,  116 => 52,  114 => 51,  108 => 47,  105 => 46,  103 => 45,  97 => 43,  95 => 42,  92 => 41,  82 => 38,  79 => 37,  77 => 36,  74 => 35,  72 => 34,  69 => 33,  61 => 30,  54 => 29,  52 => 28,  44 => 23,  35 => 20,  31 => 19,  27 => 18,  22 => 16,  65 => 37,  59 => 35,  55 => 33,  46 => 31,  42 => 30,  39 => 21,  36 => 28,  30 => 26,  28 => 25,  23 => 24,  19 => 15,);
    }
}
