<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Smalot\PdfParser\Parser;
use Spatie\PdfToText\Pdf;

class FileContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $ignore = [
        "0o" => true,
        "0s" => true,
        "3a" => true,
        "3b" => true,
        "3d" => true,
        "6b" => true,
        "6o" => true,
        "a" => true,
        "a1" => true,
        "a2" => true,
        "a3" => true,
        "a4" => true,
        "ab" => true,
        "able" => true,
        "about" => true,
        "above" => true,
        "abst" => true,
        "ac" => true,
        "accordance" => true,
        "according" => true,
        "accordingly" => true,
        "across" => true,
        "act" => true,
        "actually" => true,
        "ad" => true,
        "added" => true,
        "adj" => true,
        "ae" => true,
        "af" => true,
        "affected" => true,
        "affecting" => true,
        "affects" => true,
        "after" => true,
        "afterwards" => true,
        "ag" => true,
        "again" => true,
        "against" => true,
        "ah" => true,
        "ain" => true,
        "ain't" => true,
        "aj" => true,
        "al" => true,
        "all" => true,
        "allow" => true,
        "allows" => true,
        "almost" => true,
        "alone" => true,
        "along" => true,
        "already" => true,
        "also" => true,
        "although" => true,
        "always" => true,
        "am" => true,
        "among" => true,
        "amongst" => true,
        "amoungst" => true,
        "amount" => true,
        "an" => true,
        "and" => true,
        "announce" => true,
        "another" => true,
        "any" => true,
        "anybody" => true,
        "anyhow" => true,
        "anymore" => true,
        "anyone" => true,
        "anything" => true,
        "anyway" => true,
        "anyways" => true,
        "anywhere" => true,
        "ao" => true,
        "ap" => true,
        "apart" => true,
        "apparently" => true,
        "appear" => true,
        "appreciate" => true,
        "appropriate" => true,
        "approximately" => true,
        "ar" => true,
        "are" => true,
        "aren" => true,
        "arent" => true,
        "aren't" => true,
        "arise" => true,
        "around" => true,
        "as" => true,
        "a's" => true,
        "aside" => true,
        "ask" => true,
        "asking" => true,
        "associated" => true,
        "at" => true,
        "au" => true,
        "auth" => true,
        "av" => true,
        "available" => true,
        "aw" => true,
        "away" => true,
        "awfully" => true,
        "ax" => true,
        "ay" => true,
        "az" => true,
        "b" => true,
        "b1" => true,
        "b2" => true,
        "b3" => true,
        "ba" => true,
        "back" => true,
        "bc" => true,
        "bd" => true,
        "be" => true,
        "became" => true,
        "because" => true,
        "become" => true,
        "becomes" => true,
        "becoming" => true,
        "been" => true,
        "before" => true,
        "beforehand" => true,
        "begin" => true,
        "beginning" => true,
        "beginnings" => true,
        "begins" => true,
        "behind" => true,
        "being" => true,
        "believe" => true,
        "below" => true,
        "beside" => true,
        "besides" => true,
        "best" => true,
        "better" => true,
        "between" => true,
        "beyond" => true,
        "bi" => true,
        "bill" => true,
        "biol" => true,
        "bj" => true,
        "bk" => true,
        "bl" => true,
        "bn" => true,
        "both" => true,
        "bottom" => true,
        "bp" => true,
        "br" => true,
        "brief" => true,
        "briefly" => true,
        "bs" => true,
        "bt" => true,
        "bu" => true,
        "but" => true,
        "bx" => true,
        "by" => true,
        "c" => true,
        "c1" => true,
        "c2" => true,
        "c3" => true,
        "ca" => true,
        "call" => true,
        "came" => true,
        "can" => true,
        "cannot" => true,
        "cant" => true,
        "can't" => true,
        "cause" => true,
        "causes" => true,
        "cc" => true,
        "cd" => true,
        "ce" => true,
        "certain" => true,
        "certainly" => true,
        "cf" => true,
        "cg" => true,
        "ch" => true,
        "changes" => true,
        "ci" => true,
        "cit" => true,
        "cj" => true,
        "cl" => true,
        "clearly" => true,
        "cm" => true,
        "c'mon" => true,
        "cn" => true,
        "co" => true,
        "com" => true,
        "come" => true,
        "comes" => true,
        "con" => true,
        "concerning" => true,
        "consequently" => true,
        "consider" => true,
        "considering" => true,
        "contain" => true,
        "containing" => true,
        "contains" => true,
        "corresponding" => true,
        "could" => true,
        "couldn" => true,
        "couldnt" => true,
        "couldn't" => true,
        "course" => true,
        "cp" => true,
        "cq" => true,
        "cr" => true,
        "cry" => true,
        "cs" => true,
        "c's" => true,
        "ct" => true,
        "cu" => true,
        "currently" => true,
        "cv" => true,
        "cx" => true,
        "cy" => true,
        "cz" => true,
        "d" => true,
        "d2" => true,
        "da" => true,
        "date" => true,
        "dc" => true,
        "dd" => true,
        "de" => true,
        "definitely" => true,
        "describe" => true,
        "described" => true,
        "despite" => true,
        "detail" => true,
        "df" => true,
        "di" => true,
        "did" => true,
        "didn" => true,
        "didn't" => true,
        "different" => true,
        "dj" => true,
        "dk" => true,
        "dl" => true,
        "do" => true,
        "does" => true,
        "doesn" => true,
        "doesn't" => true,
        "doing" => true,
        "don" => true,
        "done" => true,
        "don't" => true,
        "down" => true,
        "downwards" => true,
        "dp" => true,
        "dr" => true,
        "ds" => true,
        "dt" => true,
        "du" => true,
        "due" => true,
        "during" => true,
        "dx" => true,
        "dy" => true,
        "e" => true,
        "e2" => true,
        "e3" => true,
        "ea" => true,
        "each" => true,
        "ec" => true,
        "ed" => true,
        "edu" => true,
        "ee" => true,
        "ef" => true,
        "effect" => true,
        "eg" => true,
        "ei" => true,
        "eight" => true,
        "eighty" => true,
        "either" => true,
        "ej" => true,
        "el" => true,
        "eleven" => true,
        "else" => true,
        "elsewhere" => true,
        "em" => true,
        "empty" => true,
        "en" => true,
        "end" => true,
        "ending" => true,
        "enough" => true,
        "entirely" => true,
        "eo" => true,
        "ep" => true,
        "eq" => true,
        "er" => true,
        "es" => true,
        "especially" => true,
        "est" => true,
        "et" => true,
        "et-al" => true,
        "etc" => true,
        "eu" => true,
        "ev" => true,
        "even" => true,
        "ever" => true,
        "every" => true,
        "everybody" => true,
        "everyone" => true,
        "everything" => true,
        "everywhere" => true,
        "ex" => true,
        "exactly" => true,
        "example" => true,
        "except" => true,
        "ey" => true,
        "f" => true,
        "f2" => true,
        "fa" => true,
        "far" => true,
        "fc" => true,
        "few" => true,
        "ff" => true,
        "fi" => true,
        "fifteen" => true,
        "fifth" => true,
        "fify" => true,
        "fill" => true,
        "find" => true,
        "fire" => true,
        "first" => true,
        "five" => true,
        "fix" => true,
        "fj" => true,
        "fl" => true,
        "fn" => true,
        "fo" => true,
        "followed" => true,
        "following" => true,
        "follows" => true,
        "for" => true,
        "former" => true,
        "formerly" => true,
        "forth" => true,
        "forty" => true,
        "found" => true,
        "four" => true,
        "fr" => true,
        "from" => true,
        "front" => true,
        "fs" => true,
        "ft" => true,
        "fu" => true,
        "full" => true,
        "further" => true,
        "furthermore" => true,
        "fy" => true,
        "g" => true,
        "ga" => true,
        "gave" => true,
        "ge" => true,
        "get" => true,
        "gets" => true,
        "getting" => true,
        "gi" => true,
        "give" => true,
        "given" => true,
        "gives" => true,
        "giving" => true,
        "gj" => true,
        "gl" => true,
        "go" => true,
        "goes" => true,
        "going" => true,
        "gone" => true,
        "got" => true,
        "gotten" => true,
        "gr" => true,
        "greetings" => true,
        "gs" => true,
        "gy" => true,
        "h" => true,
        "h2" => true,
        "h3" => true,
        "had" => true,
        "hadn" => true,
        "hadn't" => true,
        "happens" => true,
        "hardly" => true,
        "has" => true,
        "hasn" => true,
        "hasnt" => true,
        "hasn't" => true,
        "have" => true,
        "haven" => true,
        "haven't" => true,
        "having" => true,
        "he" => true,
        "hed" => true,
        "he'd" => true,
        "he'll" => true,
        "hello" => true,
        "help" => true,
        "hence" => true,
        "her" => true,
        "here" => true,
        "hereafter" => true,
        "hereby" => true,
        "herein" => true,
        "heres" => true,
        "here's" => true,
        "hereupon" => true,
        "hers" => true,
        "herself" => true,
        "hes" => true,
        "he's" => true,
        "hh" => true,
        "hi" => true,
        "hid" => true,
        "him" => true,
        "himself" => true,
        "his" => true,
        "hither" => true,
        "hj" => true,
        "ho" => true,
        "home" => true,
        "hopefully" => true,
        "how" => true,
        "howbeit" => true,
        "however" => true,
        "how's" => true,
        "hr" => true,
        "hs" => true,
        "http" => true,
        "hu" => true,
        "hundred" => true,
        "hy" => true,
        "i" => true,
        "i2" => true,
        "i3" => true,
        "i4" => true,
        "i6" => true,
        "i7" => true,
        "i8" => true,
        "ia" => true,
        "ib" => true,
        "ibid" => true,
        "ic" => true,
        "id" => true,
        "i'd" => true,
        "ie" => true,
        "if" => true,
        "ig" => true,
        "ignored" => true,
        "ih" => true,
        "ii" => true,
        "ij" => true,
        "il" => true,
        "i'll" => true,
        "im" => true,
        "i'm" => true,
        "immediate" => true,
        "immediately" => true,
        "importance" => true,
        "important" => true,
        "in" => true,
        "inasmuch" => true,
        "inc" => true,
        "indeed" => true,
        "index" => true,
        "indicate" => true,
        "indicated" => true,
        "indicates" => true,
        "information" => true,
        "inner" => true,
        "insofar" => true,
        "instead" => true,
        "interest" => true,
        "into" => true,
        "invention" => true,
        "inward" => true,
        "io" => true,
        "ip" => true,
        "iq" => true,
        "ir" => true,
        "is" => true,
        "isn" => true,
        "isn't" => true,
        "it" => true,
        "itd" => true,
        "it'd" => true,
        "it'll" => true,
        "its" => true,
        "it's" => true,
        "itself" => true,
        "iv" => true,
        "i've" => true,
        "ix" => true,
        "iy" => true,
        "iz" => true,
        "j" => true,
        "jj" => true,
        "jr" => true,
        "js" => true,
        "jt" => true,
        "ju" => true,
        "just" => true,
        "k" => true,
        "ke" => true,
        "keep" => true,
        "keeps" => true,
        "kept" => true,
        "kg" => true,
        "kj" => true,
        "km" => true,
        "know" => true,
        "known" => true,
        "knows" => true,
        "ko" => true,
        "l" => true,
        "l2" => true,
        "la" => true,
        "largely" => true,
        "last" => true,
        "lately" => true,
        "later" => true,
        "latter" => true,
        "latterly" => true,
        "lb" => true,
        "lc" => true,
        "le" => true,
        "least" => true,
        "les" => true,
        "less" => true,
        "lest" => true,
        "let" => true,
        "lets" => true,
        "let's" => true,
        "lf" => true,
        "like" => true,
        "liked" => true,
        "likely" => true,
        "line" => true,
        "little" => true,
        "lj" => true,
        "ll" => true,
        "ll" => true,
        "ln" => true,
        "lo" => true,
        "look" => true,
        "looking" => true,
        "looks" => true,
        "los" => true,
        "lr" => true,
        "ls" => true,
        "lt" => true,
        "ltd" => true,
        "m" => true,
        "m2" => true,
        "ma" => true,
        "made" => true,
        "mainly" => true,
        "make" => true,
        "makes" => true,
        "many" => true,
        "may" => true,
        "maybe" => true,
        "me" => true,
        "mean" => true,
        "means" => true,
        "meantime" => true,
        "meanwhile" => true,
        "merely" => true,
        "mg" => true,
        "might" => true,
        "mightn" => true,
        "mightn't" => true,
        "mill" => true,
        "million" => true,
        "mine" => true,
        "miss" => true,
        "ml" => true,
        "mn" => true,
        "mo" => true,
        "more" => true,
        "moreover" => true,
        "most" => true,
        "mostly" => true,
        "move" => true,
        "mr" => true,
        "mrs" => true,
        "ms" => true,
        "mt" => true,
        "mu" => true,
        "much" => true,
        "mug" => true,
        "must" => true,
        "mustn" => true,
        "mustn't" => true,
        "my" => true,
        "myself" => true,
        "n" => true,
        "n2" => true,
        "na" => true,
        "name" => true,
        "namely" => true,
        "nay" => true,
        "nc" => true,
        "nd" => true,
        "ne" => true,
        "near" => true,
        "nearly" => true,
        "necessarily" => true,
        "necessary" => true,
        "need" => true,
        "needn" => true,
        "needn't" => true,
        "needs" => true,
        "neither" => true,
        "never" => true,
        "nevertheless" => true,
        "new" => true,
        "next" => true,
        "ng" => true,
        "ni" => true,
        "nine" => true,
        "ninety" => true,
        "nj" => true,
        "nl" => true,
        "nn" => true,
        "no" => true,
        "nobody" => true,
        "non" => true,
        "none" => true,
        "nonetheless" => true,
        "noone" => true,
        "nor" => true,
        "normally" => true,
        "nos" => true,
        "not" => true,
        "noted" => true,
        "nothing" => true,
        "novel" => true,
        "now" => true,
        "nowhere" => true,
        "nr" => true,
        "ns" => true,
        "nt" => true,
        "ny" => true,
        "o" => true,
        "oa" => true,
        "ob" => true,
        "obtain" => true,
        "obtained" => true,
        "obviously" => true,
        "oc" => true,
        "od" => true,
        "of" => true,
        "off" => true,
        "often" => true,
        "og" => true,
        "oh" => true,
        "oi" => true,
        "oj" => true,
        "ok" => true,
        "okay" => true,
        "ol" => true,
        "old" => true,
        "om" => true,
        "omitted" => true,
        "on" => true,
        "once" => true,
        "one" => true,
        "ones" => true,
        "only" => true,
        "onto" => true,
        "oo" => true,
        "op" => true,
        "oq" => true,
        "or" => true,
        "ord" => true,
        "os" => true,
        "ot" => true,
        "other" => true,
        "others" => true,
        "otherwise" => true,
        "ou" => true,
        "ought" => true,
        "our" => true,
        "ours" => true,
        "ourselves" => true,
        "out" => true,
        "outside" => true,
        "over" => true,
        "overall" => true,
        "ow" => true,
        "owing" => true,
        "own" => true,
        "ox" => true,
        "oz" => true,
        "p" => true,
        "p1" => true,
        "p2" => true,
        "p3" => true,
        "page" => true,
        "pagecount" => true,
        "pages" => true,
        "par" => true,
        "part" => true,
        "particular" => true,
        "particularly" => true,
        "pas" => true,
        "past" => true,
        "pc" => true,
        "pd" => true,
        "pe" => true,
        "per" => true,
        "perhaps" => true,
        "pf" => true,
        "ph" => true,
        "pi" => true,
        "pj" => true,
        "pk" => true,
        "pl" => true,
        "placed" => true,
        "please" => true,
        "plus" => true,
        "pm" => true,
        "pn" => true,
        "po" => true,
        "poorly" => true,
        "possible" => true,
        "possibly" => true,
        "potentially" => true,
        "pp" => true,
        "pq" => true,
        "pr" => true,
        "predominantly" => true,
        "present" => true,
        "presumably" => true,
        "previously" => true,
        "primarily" => true,
        "probably" => true,
        "promptly" => true,
        "proud" => true,
        "provides" => true,
        "ps" => true,
        "pt" => true,
        "pu" => true,
        "put" => true,
        "py" => true,
        "q" => true,
        "qj" => true,
        "qu" => true,
        "que" => true,
        "quickly" => true,
        "quite" => true,
        "qv" => true,
        "r" => true,
        "r2" => true,
        "ra" => true,
        "ran" => true,
        "rather" => true,
        "rc" => true,
        "rd" => true,
        "re" => true,
        "readily" => true,
        "really" => true,
        "reasonably" => true,
        "recent" => true,
        "recently" => true,
        "ref" => true,
        "refs" => true,
        "regarding" => true,
        "regardless" => true,
        "regards" => true,
        "related" => true,
        "relatively" => true,
        "research" => true,
        "research-articl" => true,
        "respectively" => true,
        "resulted" => true,
        "resulting" => true,
        "results" => true,
        "rf" => true,
        "rh" => true,
        "ri" => true,
        "right" => true,
        "rj" => true,
        "rl" => true,
        "rm" => true,
        "rn" => true,
        "ro" => true,
        "rq" => true,
        "rr" => true,
        "rs" => true,
        "rt" => true,
        "ru" => true,
        "run" => true,
        "rv" => true,
        "ry" => true,
        "s" => true,
        "s2" => true,
        "sa" => true,
        "said" => true,
        "same" => true,
        "saw" => true,
        "say" => true,
        "saying" => true,
        "says" => true,
        "sc" => true,
        "sd" => true,
        "se" => true,
        "sec" => true,
        "second" => true,
        "secondly" => true,
        "section" => true,
        "see" => true,
        "seeing" => true,
        "seem" => true,
        "seemed" => true,
        "seeming" => true,
        "seems" => true,
        "seen" => true,
        "self" => true,
        "selves" => true,
        "sensible" => true,
        "sent" => true,
        "serious" => true,
        "seriously" => true,
        "seven" => true,
        "several" => true,
        "sf" => true,
        "shall" => true,
        "shan" => true,
        "shan't" => true,
        "she" => true,
        "shed" => true,
        "she'd" => true,
        "she'll" => true,
        "shes" => true,
        "she's" => true,
        "should" => true,
        "shouldn" => true,
        "shouldn't" => true,
        "should've" => true,
        "show" => true,
        "showed" => true,
        "shown" => true,
        "showns" => true,
        "shows" => true,
        "si" => true,
        "side" => true,
        "significant" => true,
        "significantly" => true,
        "similar" => true,
        "similarly" => true,
        "since" => true,
        "sincere" => true,
        "six" => true,
        "sixty" => true,
        "sj" => true,
        "sl" => true,
        "slightly" => true,
        "sm" => true,
        "sn" => true,
        "so" => true,
        "some" => true,
        "somebody" => true,
        "somehow" => true,
        "someone" => true,
        "somethan" => true,
        "something" => true,
        "sometime" => true,
        "sometimes" => true,
        "somewhat" => true,
        "somewhere" => true,
        "soon" => true,
        "sorry" => true,
        "sp" => true,
        "specifically" => true,
        "specified" => true,
        "specify" => true,
        "specifying" => true,
        "sq" => true,
        "sr" => true,
        "ss" => true,
        "st" => true,
        "still" => true,
        "stop" => true,
        "strongly" => true,
        "sub" => true,
        "substantially" => true,
        "successfully" => true,
        "such" => true,
        "sufficiently" => true,
        "suggest" => true,
        "sup" => true,
        "sure" => true,
        "sy" => true,
        "system" => true,
        "sz" => true,
        "t" => true,
        "t1" => true,
        "t2" => true,
        "t3" => true,
        "take" => true,
        "taken" => true,
        "taking" => true,
        "tb" => true,
        "tc" => true,
        "td" => true,
        "te" => true,
        "tell" => true,
        "ten" => true,
        "tends" => true,
        "tf" => true,
        "th" => true,
        "than" => true,
        "thank" => true,
        "thanks" => true,
        "thanx" => true,
        "that" => true,
        "that'll" => true,
        "thats" => true,
        "that's" => true,
        "that've" => true,
        "the" => true,
        "their" => true,
        "theirs" => true,
        "them" => true,
        "themselves" => true,
        "then" => true,
        "thence" => true,
        "there" => true,
        "thereafter" => true,
        "thereby" => true,
        "thered" => true,
        "therefore" => true,
        "therein" => true,
        "there'll" => true,
        "thereof" => true,
        "therere" => true,
        "theres" => true,
        "there's" => true,
        "thereto" => true,
        "thereupon" => true,
        "there've" => true,
        "these" => true,
        "they" => true,
        "theyd" => true,
        "they'd" => true,
        "they'll" => true,
        "theyre" => true,
        "they're" => true,
        "they've" => true,
        "thickv" => true,
        "thin" => true,
        "think" => true,
        "third" => true,
        "this" => true,
        "thorough" => true,
        "thoroughly" => true,
        "those" => true,
        "thou" => true,
        "though" => true,
        "thoughh" => true,
        "thousand" => true,
        "three" => true,
        "throug" => true,
        "through" => true,
        "throughout" => true,
        "thru" => true,
        "thus" => true,
        "ti" => true,
        "til" => true,
        "tip" => true,
        "tj" => true,
        "tl" => true,
        "tm" => true,
        "tn" => true,
        "to" => true,
        "together" => true,
        "too" => true,
        "took" => true,
        "top" => true,
        "toward" => true,
        "towards" => true,
        "tp" => true,
        "tq" => true,
        "tr" => true,
        "tried" => true,
        "tries" => true,
        "truly" => true,
        "try" => true,
        "trying" => true,
        "ts" => true,
        "t's" => true,
        "tt" => true,
        "tv" => true,
        "twelve" => true,
        "twenty" => true,
        "twice" => true,
        "two" => true,
        "tx" => true,
        "u" => true,
        "u201d" => true,
        "ue" => true,
        "ui" => true,
        "uj" => true,
        "uk" => true,
        "um" => true,
        "un" => true,
        "under" => true,
        "unfortunately" => true,
        "unless" => true,
        "unlike" => true,
        "unlikely" => true,
        "until" => true,
        "unto" => true,
        "uo" => true,
        "up" => true,
        "upon" => true,
        "ups" => true,
        "ur" => true,
        "us" => true,
        "use" => true,
        "used" => true,
        "useful" => true,
        "usefully" => true,
        "usefulness" => true,
        "uses" => true,
        "using" => true,
        "usually" => true,
        "ut" => true,
        "v" => true,
        "va" => true,
        "value" => true,
        "various" => true,
        "vd" => true,
        "ve" => true,
        "ve" => true,
        "very" => true,
        "via" => true,
        "viz" => true,
        "vj" => true,
        "vo" => true,
        "vol" => true,
        "vols" => true,
        "volumtype" => true,
        "vq" => true,
        "vs" => true,
        "vt" => true,
        "vu" => true,
        "w" => true,
        "wa" => true,
        "want" => true,
        "wants" => true,
        "was" => true,
        "wasn" => true,
        "wasnt" => true,
        "wasn't" => true,
        "way" => true,
        "we" => true,
        "wed" => true,
        "we'd" => true,
        "welcome" => true,
        "well" => true,
        "we'll" => true,
        "well-b" => true,
        "went" => true,
        "were" => true,
        "we're" => true,
        "weren" => true,
        "werent" => true,
        "weren't" => true,
        "we've" => true,
        "what" => true,
        "whatever" => true,
        "what'll" => true,
        "whats" => true,
        "what's" => true,
        "when" => true,
        "whence" => true,
        "whenever" => true,
        "when's" => true,
        "where" => true,
        "whereafter" => true,
        "whereas" => true,
        "whereby" => true,
        "wherein" => true,
        "wheres" => true,
        "where's" => true,
        "whereupon" => true,
        "wherever" => true,
        "whether" => true,
        "which" => true,
        "while" => true,
        "whim" => true,
        "whither" => true,
        "who" => true,
        "whod" => true,
        "whoever" => true,
        "whole" => true,
        "who'll" => true,
        "whom" => true,
        "whomever" => true,
        "whos" => true,
        "who's" => true,
        "whose" => true,
        "why" => true,
        "why's" => true,
        "wi" => true,
        "widely" => true,
        "will" => true,
        "willing" => true,
        "wish" => true,
        "with" => true,
        "within" => true,
        "without" => true,
        "wo" => true,
        "won" => true,
        "wonder" => true,
        "wont" => true,
        "won't" => true,
        "words" => true,
        "world" => true,
        "would" => true,
        "wouldn" => true,
        "wouldnt" => true,
        "wouldn't" => true,
        "www" => true,
        "x" => true,
        "x1" => true,
        "x2" => true,
        "x3" => true,
        "xf" => true,
        "xi" => true,
        "xj" => true,
        "xk" => true,
        "xl" => true,
        "xn" => true,
        "xo" => true,
        "xs" => true,
        "xt" => true,
        "xv" => true,
        "xx" => true,
        "y" => true,
        "y2" => true,
        "yes" => true,
        "yet" => true,
        "yj" => true,
        "yl" => true,
        "you" => true,
        "youd" => true,
        "you'd" => true,
        "you'll" => true,
        "your" => true,
        "youre" => true,
        "you're" => true,
        "yours" => true,
        "yourself" => true,
        "yourselves" => true,
        "you've" => true,
        "yr" => true,
        "ys" => true,
        "yt" => true,
        "z" => true,
        "zero" => true,
        "zi" => true,
        "zz" => true
    ];


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file;
        set_time_limit(0);
        $request->validate([
            'file' => 'required|mimes:pdf',
        ]);
        $pdfParser = new Parser();
        $pdf = $pdfParser->parseFile($file->path());
        $content = $pdf->getText();
        $_content = $content;
        $content = preg_replace('/[^a-zA-Z]/', ',', $content);
        $content = preg_replace('/[,]+/', ',', $content);
        $keywords = explode(',', $content);
        $keywordObj = [];
        if (sizeof($keywords) > 0) {
            foreach ($keywords as $keyword) {
                $keyword = trim(strtolower($keyword));
                if (@$this->ignore[$keyword]) {
                    continue;
                }
                if (@$keywordObj[$keyword]) {
                    $keywordObj[$keyword] = $keywordObj[$keyword] + 1;
                } else {
                    $keywordObj[$keyword] = 1;
                }
            }
            // $filename =  date('Y-m-d')  . '.csv';
            // $csv = fopen($filename, 'w+');
            // $header = array('Name', 'Occurance');
            // fputcsv($csv, $header);
            // foreach ($keywordObj as $key => $row) {
            //     fputcsv($csv, [
            //         $key, $row
            //     ]);
            // }
            // $headers = ['Content-Type' => 'text/csv'];
            // return response()->download($filename, $filename, $headers)->deleteFileAfterSend();
            arsort($keywordObj);
            $keywordObj = array_slice($keywordObj, 0, 10);
            return response([
                'success' => true,
                'keywords' => $keywordObj,
                'text' => nl2br($_content)
            ]);
        }
    }
}
