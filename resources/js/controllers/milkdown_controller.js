import { Controller } from "@hotwired/stimulus";
import { rootCtx, defaultValueCtx } from "@milkdown/core";
import { listenerCtx } from "@milkdown/plugin-listener";
import { destroyInstance, useEditor, useInstance } from "./milkdown/editor";
import { registerEditorControllers } from "./milkdown/controllers";

// Connects to data-controller="milkdown"
export default class extends Controller {
    static afterLoad(identifier, application) {
        registerEditorControllers();
    }

    connect() {
        const uniqueElementId = `milkdown-${Date.now()}`;

        const markup = `
            <div class="h-full relative border rounded-sm dark:border-slate-700 mt-1" data-turbo-temporary="true">
                <div id="${uniqueElementId}" class="max-w-full prose prose-slate dark:prose-invert"></div>
            </div>
        `;
        this.element.insertAdjacentHTML("afterend", markup);
        this.element.classList.add("hidden");

        useEditor()
            .config((ctx) => {
                ctx.set(rootCtx, document.getElementById(uniqueElementId));
                ctx.set(defaultValueCtx, this.element.value);

                ctx.get(listenerCtx).markdownUpdated(
                    (ctx, markdown, prevMarkdown) => {
                        this.element.value = markdown;
                    },
                );
            })
            .create()
            .then(() => {
                console.log("edit redo");
            });
    }

    disconnect() {
        destroyInstance();
    }
}
