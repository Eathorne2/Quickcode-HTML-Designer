<div onclick="this.classList.add('quickcode-hide')" oncontextmenu="return false;" class="quickcode-js-sub_menu quickcode-sub_menu_dropdown quickcode-hide" style="z-index: 4909;position: absolute;color: white;">
    <div onclick="submenu_actions.change_z_index('up',event)">
      <svg fill="#f7d6b5" width="20" height="20" viewBox="0 0 24 24"><path d="M24 22h-24l12-20z"/></svg>
      Move up
    </div>
    <div onclick="submenu_actions.change_z_index('down',event)">
      <svg fill="#f7d6b5" width="20" height="20" style="transform:rotate(180deg);" viewBox="0 0 24 24"><path d="M24 22h-24l12-20z"/></svg>
      Move down
    </div>
    <div onclick="submenu_actions.change_z_index('top',event)" class="quickcode-top_border">
      <svg fill="#44d1e5" width="20" height="20" style="transform:rotate(-90deg);" viewBox="0 0 24 24"><path d="M19 12l-18 12v-24l18 12zm4-11h-4v22h4v-22z"/></svg>
      Move to top
    </div>
    <div onclick="submenu_actions.change_z_index('bottom',event)">
      <svg fill="#44d1e5" width="20" height="20" style="transform:rotate(90deg);" viewBox="0 0 24 24"><path d="M19 12l-18 12v-24l18 12zm4-11h-4v22h4v-22z"/></svg>
      Move to Bottom
    </div>
    <div onclick="submenu_actions.clone_element(event)" class="quickcode-top_border">
      <svg fill="#4cd4b0" width="20" height="20" viewBox="0 0 24 24"><path d="M13.508 11.504l.93-2.494 2.998 6.268-6.31 2.779.894-2.478s-8.271-4.205-7.924-11.58c2.716 5.939 9.412 7.505 9.412 7.505zm7.492-9.504v-2h-21v21h2v-19h19zm-14.633 2c.441.757.958 1.422 1.521 2h14.112v16h-16v-8.548c-.713-.752-1.4-1.615-2-2.576v13.124h20v-20h-17.633z"/></svg>
      Clone
    </div>
    <div onclick="submenu_actions.duplicate_element(event)" >
      <svg fill="#4cd4b0" width="20" height="20" viewBox="0 0 24 24"><path d="M18 6v-6h-18v18h6v6h18v-18h-6zm-12 10h-4v-14h14v4h-10v10zm16 6h-14v-14h14v14zm-3-8h-3v-3h-2v3h-3v2h3v3h2v-3h3v-2z"/></svg>
      Duplicate
    </div>
    <div onclick="submenu_actions.cut_element(event)" >
      <svg fill="#ff9f55" width="20" height="20" viewBox="0 0 24 24"><path d="M12.026 14.116c-3.475 1.673-7.504 3.619-8.484 4.09-1.848.889-3.542-1.445-3.542-1.445l8.761-4.226 3.265 1.581zm7.93 6.884c-.686 0-1.393-.154-2.064-.479-1.943-.941-2.953-3.001-2.498-4.854.26-1.057-.296-1.201-1.145-1.612l-14.189-6.866s1.7-2.329 3.546-1.436c1.134.549 5.689 2.747 9.614 4.651l.985-.474c.85-.409 1.406-.552 1.149-1.609-.451-1.855.564-3.913 2.51-4.848.669-.321 1.373-.473 2.054-.473 2.311 0 4.045 1.696 4.045 3.801 0 1.582-.986 3.156-2.613 3.973-1.625.816-2.765.18-4.38.965l-.504.245.552.27c1.613.789 2.754.156 4.377.976 1.624.819 2.605 2.392 2.605 3.97 0 2.108-1.739 3.8-4.044 3.8zm-2.555-12.815c.489 1.022 1.876 1.378 3.092.793 1.217-.584 1.809-1.893 1.321-2.916-.489-1.022-1.876-1.379-3.093-.794s-1.808 1.894-1.32 2.917zm-3.643 3.625c0-.414-.335-.75-.75-.75-.414 0-.75.336-.75.75s.336.75.75.75.75-.336.75-.75zm6.777 3.213c-1.215-.588-2.604-.236-3.095.786-.491 1.022.098 2.332 1.313 2.919 1.215.588 2.603.235 3.094-.787.492-1.021-.097-2.33-1.312-2.918z"/></svg>
      Cut Element
    </div>
    <div onclick="submenu_actions.copy_element(event)" >
      <svg fill="#ff9f55" width="20" height="20" viewBox="0 0 24 24"><path d="m6 18v3c0 .621.52 1 1 1h14c.478 0 1-.379 1-1v-14c0-.478-.379-1-1-1h-3v-3c0-.478-.379-1-1-1h-14c-.62 0-1 .519-1 1v14c0 .621.52 1 1 1zm10.5-12h-9.5c-.62 0-1 .519-1 1v9.5h-2.5v-13h13z" fill-rule="nonzero"/></svg>
      Copy Element
    </div>
    <div onclick="submenu_actions.paste_element(event)" >
      <svg fill="#ff9f55" width="20" height="20" viewBox="0 0 24 24"><path d="M21 2h-19v19h-2v-21h21v2zm3 2v20h-20v-20h20zm-2 2h-1.93c-.669 0-1.293.334-1.664.891l-1.406 2.109h-6l-1.406-2.109c-.371-.557-.995-.891-1.664-.891h-1.93v16h16v-16zm-3 6h-10v1h10v-1zm0 3h-10v1h10v-1zm0 3h-10v1h10v-1z"/></svg>
      Paste Element
    </div>
    <div onclick="submenu_actions.delete_element(event)" >
      <svg fill="#ffcb00" width="20" height="20" viewBox="0 0 24 24"><path  id="delete" d="M3 6v18h18v-18h-18zm5 14c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4-18v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.315c0 .901.73 2 1.631 2h5.712z"/></svg>
      Delete
    </div>
    <div onclick="submenu_actions.clear_contents(event)" >
      <svg fill="#ffcb00" width="20" height="20" viewBox="0 0 24 24"><path  id="Clear contents" onclick="submenu_actions.delete_element(event)"  d="M3 6v18h18v-18h-18zm5 14c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4-18v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.315c0 .901.73 2 1.631 2h5.712z"/></svg>
      Clear Contents
    </div>
    
    <div class="quickcode-top_border" onclick="actions.select_handle(event)">
      <svg fill="#ff9f55" width="20" height="20" viewBox="0 0 24 24"><path d="M18 8v-2h-2v2h-10v16h18v-16h-6zm4 14h-14v-12h14v12zm-6-20h-3v-2h5v4h-2v-2zm-14 8h-2v-4h2v4zm9-8h-4v-2h4v2zm-11-2h5v2h-3v2h-2v-4zm2 14h3v2h-5v-4h2v2z"/></svg>
      Select Handle
    </div>
    <div class="quickcode-top_border" onclick="submenu_actions.select_parent(event)">
      <svg fill="#ff9f55" width="20" height="20" viewBox="0 0 24 24"><path d="M18 8v-2h-2v2h-10v16h18v-16h-6zm4 14h-14v-12h14v12zm-6-20h-3v-2h5v4h-2v-2zm-14 8h-2v-4h2v4zm9-8h-4v-2h4v2zm-11-2h5v2h-3v2h-2v-4zm2 14h3v2h-5v-4h2v2z"/></svg>
      Select Parent
    </div>
    <div onclick="submenu_actions.select_child(event)">
      <svg fill="#ff9f55" width="20" height="20" viewBox="0 0 24 24"><path d="M8 12h-2v-4h5v2h-3v2zm11-4v2h3v2h2v-4h-5zm-11 12h-2v4h5v-2h-3v-2zm5 4h4v-2h-4v2zm9-6h2v-4h-2v4zm0 4h-3v2h5v-4h-2v2zm-14-4v-4h-6v-12h14v6h-3v2h5v-10h-18v16h6v2h2z"/></svg>
      Select First Child
    </div>
    <div onclick="submenu_actions.select_prev_sibling(event)">
      <svg fill="#44d1e5" width="20" height="20" viewBox="0 0 24 24"><path d="M18.764 17.385l2.66 5.423-2.441 1.192-2.675-5.474-3.308 2.863v-12.389l10 7.675-4.236.71zm2.236-7.385h2v-4h-2v4zm0 2.619l2 1.535v-2.154h-2v.619zm-10 8.77v-1.389h-4v2h4v-.611zm-8-3.389h-2v4h4v-2h-2v-2zm-2-14h2v-2h2v-2h-4v4zm2 8h-2v4h2v-4zm8-12h-4v2h4v-2zm6 0h-4v2h4v-2zm4 4h2v-4h-4v2h2v2zm-18 2h-2v4h2v-4z"/></svg>
      Select Prev Sibling
    </div>
    <div onclick="submenu_actions.select_next_sibling(event)">
      <svg style="transform: rotate(180deg);" fill="#44d1e5" width="20" height="20" viewBox="0 0 24 24"><path d="M18.764 17.385l2.66 5.423-2.441 1.192-2.675-5.474-3.308 2.863v-12.389l10 7.675-4.236.71zm2.236-7.385h2v-4h-2v4zm0 2.619l2 1.535v-2.154h-2v.619zm-10 8.77v-1.389h-4v2h4v-.611zm-8-3.389h-2v4h4v-2h-2v-2zm-2-14h2v-2h2v-2h-4v4zm2 8h-2v4h2v-4zm8-12h-4v2h4v-2zm6 0h-4v2h4v-2zm4 4h2v-4h-4v2h2v2zm-18 2h-2v4h2v-4z"/></svg>
      Select Next Sibling
    </div>
    
    <div class="quickcode-top_border" onclick="selector.show_sub_menu_dropdown(this, false)">
      <svg fill="#ff9f55" width="20" height="20" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.151 17.943l-4.143-4.102-4.117 4.159-1.833-1.833 4.104-4.157-4.162-4.119 1.833-1.833 4.155 4.102 4.106-4.16 1.849 1.849-4.1 4.141 4.157 4.104-1.849 1.849z"/></svg>
      Close Menu
    </div>
</div>
