<?php

/* core/modules/system/templates/status-messages.html.twig */
class __TwigTemplate_4ecd5649d93476272966559bdf301660 extends Drupal\Core\Template\TwigTemplate
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
        // line 23
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["message_list"]) ? $context["message_list"] : null));
        foreach ($context['_seq'] as $context["type"] => $context["messages"]) {
            // line 24
            echo "  <div class=\"messages messages--";
            echo twig_render_var($this->getContextReference($context, "type"));
            echo "\">
    ";
            // line 25
            if ($this->getAttribute((isset($context["status_headings"]) ? $context["status_headings"] : null), (isset($context["type"]) ? $context["type"] : null), array(), "array")) {
                // line 26
                echo "      <h2 class=\"visually-hidden\">";
                echo twig_render_var($this->getAttribute($this->getContextReference($context, "status_headings"), $this->getContextReference($context, "type"), array(), "array"));
                echo "</h2>
    ";
            }
            // line 28
            echo "    ";
            if ((twig_length_filter($this->env, (isset($context["messages"]) ? $context["messages"] : null)) > 1)) {
                // line 29
                echo "      <ul class=\"messages__list\">
        ";
                // line 30
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["messages"]) ? $context["messages"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                    // line 31
                    echo "          <li class=\"messages__item\">";
                    echo twig_render_var($this->getContextReference($context, "message"));
                    echo "</li>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 33
                echo "      </ul>
    ";
            } else {
                // line 35
                echo "      ";
                echo twig_render_var($this->getAttribute($this->getContextReference($context, "messages"), 0));
                echo "
    ";
            }
            // line 37
            echo "  </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['messages'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
    }

    public function getTemplateName()
    {
        return "core/modules/system/templates/status-messages.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 37,  59 => 35,  55 => 33,  46 => 31,  42 => 30,  39 => 29,  36 => 28,  30 => 26,  28 => 25,  23 => 24,  19 => 23,);
    }
}
