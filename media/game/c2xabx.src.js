abx_locked  = false;

function abx(rc, score)
{
    if(rc != 'BestScore' && rc != 'LastScore')
    {
        return;
    }
    if(abx_locked)
    {
        return;
    }
    
    abx_locked = true;

    randomstr   = md5(Math.floor(Math.random() * 1257) * Math.floor(Math.random() * 10));

    date = new Date();
    date.setTime(date.getTime() + (1*24*60*60*1000));
    expires = 'expires=' + date.toUTCString() + '; ';
    path    = 'path=/; ';

    document.cookie = '_m_h5_tk=' + (md5(Math.floor(Math.random() * 1257) * Math.floor(Math.random() * 10)) + "=.%*&^@" + Math.floor(Math.random() * 7) +  Math.floor(Math.random() * 10)).shuffle() + '; ' + expires + path;
    document.cookie = 'cto_axid=' + (md5(Math.floor(Math.random() * 2452) * Math.floor(Math.random() * 10)) + "=.[}FE]").shuffle() + '; ' + expires + path;
    document.cookie = ' xlly_s=' + (md5(Math.floor(Math.random() * 88983) * Math.floor(Math.random() * 10)) + "=.%?>J").shuffle() + '; ' + expires + path;
    document.cookie = ' everest_g_v2=' + ('_xF[B_#E').shuffle() + (Math.floor(Math.random() * 20) +  Math.floor(Math.random() * 10) + "=_%").shuffle() + '; ' + expires + path;
    document.cookie = 'ev_sync_bk=' + md5(Math.floor(Math.random() * 3547) * Math.floor(Math.random() * 10)) + '; ' + expires + path;
    document.cookie = '_tb_token_=' + Math.floor(Math.random() * 20) +  Math.floor(Math.random() * 7) + '; ' + expires + path;
    document.cookie = 'lzd_click_id=' + Math.floor(Math.random() * 50) +  Math.floor(Math.random() * 9) + '; ' + expires + path;
    document.cookie = 'miidlaz=' + Math.floor(Math.random() * 20) +  Math.floor(Math.random() * 10) + '; ' + expires + path;
    document.cookie = '_leksxia_x2=' + ('_xF[B_#E').shuffle().replace('[', score) + '; ' + expires + path;

    parent.postMessage({
        source: 'sharp',
        action: 'game_end',
        score: score
    }, '*')

    if((window.fullScreen) || (window.innerWidth == screen.width && window.innerHeight == screen.height))
    {
        document.exitFullscreen();
    }

    setTimeout(function(){
        abx_locked = false;
    }, 1000);
}